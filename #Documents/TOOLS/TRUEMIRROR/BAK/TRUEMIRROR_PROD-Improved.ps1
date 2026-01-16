<#
=============================================================
Enhanced Ultimate PowerShell Mirror Script - PROD VERSION
=============================================================
Features:
- Choose between FULL MIRROR and INCREMENTAL UPDATE modes
- Hash verification (SHA256) for every file
- Automatic retry on failures (3 attempts)
- Long path support (>260 chars)
- Proper junction handling
- IGNORE folders from source (don't copy them)
- EXCLUDE specific files from source (by pattern)
- Progress tracking with ETA
- Comprehensive logging
- Final verification (excluding ignored folders and excluded files)
- OPTIONAL hash check for incremental updates (can be skipped for speed)
- HASH CACHE SYSTEM for faster incremental scans
- AUTO-SKIP locked log files

How to run:
1. Open PowerShell 7+ as Administrator
2. Run: .\TRUEMIRROR_PROD.ps1
3. Log file: C:\enhanced_mirror C to E.log
#>

# ===================== CONFIG =====================
$source = "C:\xampp\htdocs\pmway.hopto.org"        # Source folder
$destination = "E:\pmway"   # Destination folder
$logFile = "C:\enhanced_mirrorlog XampptoE."      # Log file location
$maxRetries = 3                          # Max retries per file
$progressInterval = 10                   # Progress update frequency (every N files)
$enableFinalHashCheck = $true            # Final folder hash verification (can be overridden for incremental)
$recreateJunctions = $false              # Recreate junctions properly
$largeFileSizeMB = 50                    # Show progress for files larger than this (MB)

# ===================== DRIVE CONFIGURATION =====================
$destinationDrive = "E"  # Destination drive letter

# ===================== IGNORE RULES (SOURCE) =====================
$ignoreFoldersInDest = @( 
    ".git",
    "storage\framework\sessions\"
)

# ===================== FILE EXCLUSION RULES =====================
$excludeFiles = @(
    # Add common locked files here to skip them entirely
    "laravel.log",
    "*.tmp",
    "*.temp"
)

# ===================== HASH CACHE CONFIG =====================
$hashCacheFile = Join-Path $destination ".mirror_hash_cache.json"
$useHashCache = $true  # Enable hash caching for faster incremental scans

# ===================== OPERATION MODE SELECTION =====================
Clear-Host
Write-Host "======================================================" -ForegroundColor Cyan
Write-Host "       ENHANCED MIRROR SCRIPT - MODE SELECTION        " -ForegroundColor Cyan
Write-Host "======================================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Please select the operation mode:" -ForegroundColor Yellow
Write-Host ""
Write-Host "[F] FULL MIRROR - Delete everything in destination and create fresh copy" -ForegroundColor White
Write-Host "    ✓ Guarantees perfect mirror" -ForegroundColor Gray
Write-Host "    ⚠️  Slower, high disk I/O, deletes all existing files" -ForegroundColor Gray
Write-Host ""
Write-Host "[I] INCREMENTAL UPDATE - Only copy changed files" -ForegroundColor White
Write-Host "    ✓ Faster, low disk I/O, preserves existing unchanged files" -ForegroundColor Gray
Write-Host "    ⚠️  More complex, requires file comparison" -ForegroundColor Gray
Write-Host ""
Write-Host "======================================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Enter F for FULL MIRROR or I for INCREMENTAL UPDATE: " -ForegroundColor Yellow -NoNewline

do {
    $mode = Read-Host
    $mode = $mode.ToUpper()
    if ($mode -notin @('F', 'I')) {
        Write-Host "Invalid selection. Please enter F or I: " -ForegroundColor Red -NoNewline
    }
} while ($mode -notin @('F', 'I'))

$operationMode = if ($mode -eq 'F') { "FULL_MIRROR" } else { "INCREMENTAL_UPDATE" }
Write-Host "Selected mode: $operationMode" -ForegroundColor Green

# ===================== HASH CHECK OPTION =====================
$runFinalHashCheck = $enableFinalHashCheck

# Always show hash check option for incremental mode
if ($operationMode -eq "INCREMENTAL_UPDATE") {
    Write-Host ""
    Write-Host "======================================================" -ForegroundColor Cyan
    Write-Host "           HASH CHECK OPTION (INCREMENTAL)            " -ForegroundColor Cyan
    Write-Host "======================================================" -ForegroundColor Cyan
    
    Write-Host ""
    Write-Host "Hash checking verifies ALL files match (takes time but ensures accuracy)." -ForegroundColor Yellow
    Write-Host "With hash caching, incremental scans are faster but final check still takes time." -ForegroundColor Yellow
    Write-Host ""
    Write-Host "Run final hash check after this incremental update?" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "[Y] Yes - Run hash check (slower, verifies everything)" -ForegroundColor White
    Write-Host "[N] No  - Skip hash check (faster, trust incremental scan)" -ForegroundColor White
    Write-Host ""
    Write-Host "Enter Y or N: " -ForegroundColor Yellow -NoNewline
    
    do {
        $hashChoice = Read-Host
        $hashChoice = $hashChoice.ToUpper()
        if ($hashChoice -notin @('Y', 'N')) {
            Write-Host "Invalid selection. Please enter Y or N: " -ForegroundColor Red -NoNewline
        }
    } while ($hashChoice -notin @('Y', 'N'))
    
    $runFinalHashCheck = ($hashChoice -eq 'Y')
    
    if ($runFinalHashCheck) {
        Write-Host "✓ Hash check will run after sync (unless files fail)" -ForegroundColor Green
    } else {
        Write-Host "⚠️  Hash check skipped" -ForegroundColor Yellow
    }
} else {
    # Full mirror mode - hash check is mandatory
    Write-Host ""
    Write-Host "ℹ️  FULL MIRROR mode: Hash checking is mandatory" -ForegroundColor Cyan
    $runFinalHashCheck = $true
}

# Debug: Show hash check decision
Write-Host "`n[DEBUG] Hash check will run: $runFinalHashCheck" -ForegroundColor Magenta

# ===================== HASH CACHE FUNCTIONS =====================
function Get-HashCache {
    if ($script:useHashCache -and (Test-Path $script:hashCacheFile)) {
        try {
            $cacheContent = Get-Content $script:hashCacheFile -Raw -ErrorAction Stop
            $cache = $cacheContent | ConvertFrom-Json -AsHashtable -ErrorAction Stop
            Log "Loaded hash cache with $($cache.Count) entries" "Gray"
            return $cache
        } catch {
            Log "Hash cache corrupted, starting fresh: $($_.Exception.Message)" "Yellow"
            return @{}
        }
    }
    return @{}
}

function Update-HashCache {
    param(
        [hashtable]$cache,
        [string]$relativePath,
        [string]$hash,
        [long]$size,
        [datetime]$lastModified
    )
    
    $cache[$relativePath] = @{
        Hash = $hash
        Size = $size
        LastModified = $lastModified.ToString("o")
        Timestamp = (Get-Date).ToString("o")
    }
}

function Save-HashCache {
    param([hashtable]$cache)
    
    if (-not $script:useHashCache) { return }
    
    try {
        $cache | ConvertTo-Json -Depth 3 -Compress | Out-File $script:hashCacheFile -Force -Encoding UTF8
        Log "Saved hash cache with $($cache.Count) entries" "Gray"
    } catch {
        Log "Warning: Could not save hash cache: $($_.Exception.Message)" "Yellow"
    }
}

function Get-CachedHash {
    param(
        [hashtable]$cache,
        [string]$relativePath,
        [long]$currentSize,
        [datetime]$currentLastModified
    )
    
    if ($cache.ContainsKey($relativePath)) {
        $cached = $cache[$relativePath]
        
        # Verify file hasn't changed since cache was created
        $cacheTime = [datetime]::Parse($cached.LastModified)
        
        # Allow 1 second tolerance for timestamp differences
        $timeDifference = [math]::Abs(($currentLastModified - $cacheTime).TotalSeconds)
        
        if ($currentSize -eq $cached.Size -and $timeDifference -le 1) {
            return $cached.Hash
        }
    }
    
    return $null
}

# Load hash cache at start
$hashCache = Get-HashCache
$cacheHits = 0
$cacheMisses = 0

# ===================== DEBUG PATH CHECK =====================
Write-Host "`n=== DEBUG PATH CHECK ===" -ForegroundColor Yellow
Write-Host "Source: $source" -ForegroundColor Cyan
Write-Host "Source exists: $(Test-Path $source)" -ForegroundColor Cyan
Write-Host "Destination: $destination" -ForegroundColor Cyan
Write-Host "Destination exists: $(Test-Path $destination)" -ForegroundColor Cyan

# FIX: Extract drive letter from destination path
$destinationDrive = $destination.Substring(0, 1)

# Check disk space
$drive = Get-PSDrive -Name $destinationDrive -ErrorAction SilentlyContinue
if ($drive) {
    $freeGB = [math]::Round($drive.Free / 1GB, 2)
    $totalGB = [math]::Round(($drive.Used + $drive.Free) / 1GB, 2)
    Write-Host "$($destinationDrive): drive - Free: $freeGB GB / Total: $totalGB GB" -ForegroundColor Cyan
    
    if ($freeGB -lt 1) {
        Write-Host "WARNING: Low disk space on $($destinationDrive): drive!" -ForegroundColor Red
    }
} else {
    Write-Host "ERROR: $($destinationDrive): drive not found or not accessible!" -ForegroundColor Red
    Write-Host "Please check if the SSD is properly connected and mounted." -ForegroundColor Red
}

# Test write access
$testFile = Join-Path $destination "test_write.txt"
try {
    if (-not (Test-Path $destination)) {
        New-Item -ItemType Directory -Path $destination -Force | Out-Null
    }
    "test" | Out-File -FilePath $testFile -Force -ErrorAction Stop
    Write-Host "✓ Can write to destination" -ForegroundColor Green
    Remove-Item $testFile -Force -ErrorAction SilentlyContinue
} catch {
    Write-Host "✗ Cannot write to destination: $($_.Exception.Message)" -ForegroundColor Red
}

Write-Host "`nPress ENTER to continue or Ctrl+C to cancel..." -ForegroundColor Yellow
Read-Host

# ===================== LONG PATH SUPPORT =====================
function Get-LongPath($path) {
    if ($path -notmatch "^\\\\\?\\") {
        $fullPath = [System.IO.Path]::GetFullPath($path)
        if ($fullPath -match "^[A-Z]:\\") {
            return "\\?\$fullPath"
        }
    }
    return $path
}

function Get-ShortPath($path) {
    return $path -replace '^\\\\\?\\', ''
}

# ===================== IGNORE LOGIC =====================
function Test-ShouldIgnore($relativePath) {
    $pathParts = $relativePath -split '\\'
    foreach ($part in $pathParts) {
        foreach ($pattern in $script:ignoreFoldersInDest) {
            if ($part -like $pattern) {
                return $true
            }
        }
    }
    return $false
}

function Test-ShouldExcludeFile($fileName) {
    foreach ($pattern in $script:excludeFiles) {
        if ($fileName -like $pattern) {
            return $true
        }
    }
    return $false
}

# ===================== FILE LOCK DETECTION =====================
function Test-FileIsLocked {
    param([string]$filePath)
    
    try {
        $fileStream = [System.IO.File]::Open($filePath, 'Open', 'Read', 'None')
        $fileStream.Close()
        return $false
    } catch {
        if ($_.Exception.Message -like "*being used by another process*" -or 
            $_.Exception.Message -like "*cannot access*") {
            return $true
        }
        return $false
    }
}

function Copy-FileWithLockHandling {
    param(
        [string]$sourcePath,
        [string]$destPath
    )
    
    # Check if file is locked
    if (Test-FileIsLocked $sourcePath) {
        # For log files, skip them entirely (they're not critical for backup)
        if ($sourcePath -match '\.(log|tmp|temp)$') {
            Log "  Skipping locked file: $(Split-Path -Leaf $sourcePath)" "Yellow"
            return "SKIPPED"
        }
        
        # For non-log files, try with file sharing
        try {
            $sourceStream = New-Object System.IO.FileStream(
                $sourcePath,
                [System.IO.FileMode]::Open,
                [System.IO.FileAccess]::Read,
                [System.IO.FileShare]::ReadWrite
            )
            $destStream = [System.IO.File]::Create($destPath)
            $sourceStream.CopyTo($destStream)
            $sourceStream.Close()
            $destStream.Close()
            return "COPIED_WITH_SHARING"
        } catch {
            return "FAILED_LOCKED"
        }
    }
    
    # Normal copy if not locked
    try {
        Copy-Item -LiteralPath $sourcePath -Destination $destPath -Force -ErrorAction Stop
        return "COPIED_NORMAL"
    } catch {
        if ($_.Exception.Message -match "PathTooLong" -or $_.Exception.Message -match "path.*too long") {
            try {
                $longSourcePath = Get-LongPath $sourcePath
                $longDestPath = Get-LongPath $destPath
                [System.IO.File]::Copy($longSourcePath, $longDestPath, $true)
                return "COPIED_LONGPATH"
            } catch {
                return "FAILED"
            }
        }
        return "FAILED"
    }
}

# ===================== INCREMENTAL SCAN FUNCTION =====================
function Get-IncrementalChanges {
    param(
        [string]$Source,
        [string]$Destination
    )
    
    Log "Scanning for incremental changes (with hash cache)..." "Cyan"
    
    $filesToCopy = @()      # New files
    $filesToUpdate = @()    # Changed files
    $filesToDelete = @()    # Files no longer in source
    
    # Scan source files
    $sourceFiles = Get-ChildItem -Path $Source -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
        $relativePath = $_.FullName.Substring($Source.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    }
    
    # Scan destination files
    $destFiles = Get-ChildItem -Path $Destination -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
        $relativePath = $_.FullName.Substring($Destination.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    }
    
    # Create hashtables
    $sourceFileInfo = @{}
    $destFileInfo = @{}
    
    Log "Processing source files..." "Gray"
    foreach ($file in $sourceFiles) {
        $relativePath = $file.FullName.Substring($Source.Length).TrimStart('\')
        $sourceFileInfo[$relativePath] = @{
            Path = $file.FullName
            Size = $file.Length
            LastWriteTime = $file.LastWriteTime
        }
    }
    
    Log "Processing destination files..." "Gray"
    foreach ($file in $destFiles) {
        $relativePath = $file.FullName.Substring($Destination.Length).TrimStart('\')
        $destFileInfo[$relativePath] = @{
            Path = $file.FullName
            Size = $file.Length
            LastWriteTime = $file.LastWriteTime
        }
    }
    
    Log "Comparing files (with hash cache optimization)..." "Gray"
    $totalSourceFiles = $sourceFileInfo.Count
    $processed = 0
    $script:cacheHits = 0
    $script:cacheMisses = 0
    
    # Identify new and changed files
    foreach ($relativePath in $sourceFileInfo.Keys) {
        $processed++
        if ($processed % 500 -eq 0) {
            $pct = [math]::Round(($processed / $totalSourceFiles) * 100, 1)
            Write-Host "  Comparing: $processed/$totalSourceFiles ($pct%) [Cache: $($script:cacheHits) hits]" -ForegroundColor Gray
        }
        
        $sourceItem = $sourceFileInfo[$relativePath]
        $destItem = $destFileInfo[$relativePath]
        
        if (-not $destItem) {
            # File doesn't exist in destination
            $filesToCopy += $relativePath
        } else {
            # File exists, check if it's different
            $needsUpdate = $false
            
            # Quick check: Size and date
            if ($sourceItem.Size -ne $destItem.Size -or 
                $sourceItem.LastWriteTime -ne $destItem.LastWriteTime) {
                $needsUpdate = $true
            }
            
            # If quick check suggests change, verify with hash
            if ($needsUpdate) {
                try {
                    # Try to use cached hash first
                    $cachedHash = Get-CachedHash -cache $script:hashCache -relativePath $relativePath `
                        -currentSize $sourceItem.Size -currentLastModified $sourceItem.LastWriteTime
                    
                    if ($cachedHash) {
                        $sourceHash = $cachedHash
                        $script:cacheHits++
                    } else {
                        # Compute fresh hash
                        $sourceHash = (Get-FileHash -LiteralPath $sourceItem.Path -Algorithm SHA256 -ErrorAction Stop).Hash
                        $script:cacheMisses++
                        
                        # Update cache
                        Update-HashCache -cache $script:hashCache -relativePath $relativePath `
                            -hash $sourceHash -size $sourceItem.Size -lastModified $sourceItem.LastWriteTime
                    }
                    
                    $destHash = (Get-FileHash -LiteralPath $destItem.Path -Algorithm SHA256 -ErrorAction Stop).Hash
                    
                    if ($sourceHash -ne $destHash) {
                        $filesToUpdate += $relativePath
                    }
                } catch {
                    # If hashing fails, assume file needs update
                    $filesToUpdate += $relativePath
                }
            }
        }
    }
    
    # Identify files to delete
    foreach ($relativePath in $destFileInfo.Keys) {
        if (-not $sourceFileInfo.ContainsKey($relativePath)) {
            $filesToDelete += $relativePath
        }
    }
    
    Log "Cache performance: $($script:cacheHits) hits, $($script:cacheMisses) misses" "Gray"
    if ($script:cacheHits -gt 0) {
        $cacheEfficiency = [math]::Round(($script:cacheHits / ($script:cacheHits + $script:cacheMisses)) * 100, 1)
        Log "Cache efficiency: $cacheEfficiency%" "Green"
    }
    
    return @{
        ToCopy = $filesToCopy
        ToUpdate = $filesToUpdate
        ToDelete = $filesToDelete
        SourceFileCount = $totalSourceFiles
        DestFileCount = $destFileInfo.Count
        CacheHits = $script:cacheHits
        CacheMisses = $script:cacheMisses
    }
}

# ===================== LOGGING =====================
function Log($message, $color = "White") {
    Write-Host $message -ForegroundColor $color
    Add-Content -Path $logFile -Value $message
}

function Log-Header($message) {
    $line = "=" * 60
    Log "`n$line" "Cyan"
    Log $message "Cyan"
    Log "$line" "Cyan"
}

# ===================== START =====================
Clear-Host
Write-Host "Enhanced Mirror Script - Log: $logFile" -ForegroundColor Cyan
"" | Out-File $logFile
Log-Header "ENHANCED MIRROR STARTED"
Log "Source:      $source"
Log "Destination: $destination"
Log "Mode:        $operationMode"
Log "Hash Check:  $(if($runFinalHashCheck){'Enabled'}else{'Skipped (Incremental)'})"
Log "Hash Cache:  $(if($useHashCache){'Enabled'}else{'Disabled'})"
Log "Timestamp:   $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"

if ($ignoreFoldersInDest.Count -gt 0) {
    Log "`nIgnore Rules (will NOT be copied from source):" "Cyan"
    foreach ($pattern in $ignoreFoldersInDest) {
        Log "  - Folders matching: $pattern" "Cyan"
    }
}

if ($excludeFiles.Count -gt 0) {
    Log "`nFile Exclusion Rules (will NOT be copied from source):" "Cyan"
    foreach ($pattern in $excludeFiles) {
        Log "  - Files matching: $pattern" "Cyan"
    }
}

# Verify source exists
if (-not (Test-Path $source)) {
    Log "ERROR: Source folder does not exist!" "Red"
    Write-Host "`nPress ENTER to exit..."
    Read-Host
    exit 1
}

# Verify destination drive
$destinationDrivePath = "$($destinationDrive):\"
if (-not (Test-Path $destinationDrivePath)) {
    Log "ERROR: $($destinationDrive): drive is not accessible!" "Red"
    Write-Host "`nPress ENTER to exit..."
    Read-Host
    exit 1
}

# Create destination if it doesn't exist
if (-not (Test-Path $destination)) {
    Log "Destination folder does not exist - creating it" "Yellow"
    try {
        New-Item -ItemType Directory -Path $destination -Force | Out-Null
        Log "✓ Created new destination folder" "Green"
    } catch {
        Log "ERROR: Could not create destination folder - $($_.Exception.Message)" "Red"
        Write-Host "`nPress ENTER to exit..."
        Read-Host
        exit 1
    }
}

# ===================== DETECT IGNORED FOLDERS IN SOURCE =====================
Log-Header "DETECTING IGNORED FOLDERS IN SOURCE"
$sourceIgnoredFolders = @()
$sourceItems = Get-ChildItem $source -Directory -Recurse -Force -ErrorAction SilentlyContinue
foreach ($item in $sourceItems) {
    $relativePath = $item.FullName.Substring($source.Length).TrimStart('\')
    if (Test-ShouldIgnore $relativePath) {
        $sourceIgnoredFolders += $relativePath
    }
}

if ($sourceIgnoredFolders.Count -gt 0) {
    Log "Found $($sourceIgnoredFolders.Count) folder(s) in source that will be SKIPPED:" "Yellow"
    $sourceIgnoredFolders | Select-Object -First 10 | ForEach-Object { Log "  - $_" "Yellow" }
    if ($sourceIgnoredFolders.Count -gt 10) {
        Log "  ... and $($sourceIgnoredFolders.Count - 10) more" "Yellow"
    }
} else {
    Log "No ignored folders found in source."
}

# ===================== INITIALIZE VARIABLES =====================
$deletedCount = 0
$junctionsCreated = 0
$failed = @()
$skipped = @()  # For locked files we intentionally skip

# ===================== MODE-SPECIFIC PROCESSING =====================
if ($operationMode -eq "FULL_MIRROR") {
    # ===================== DELETE DESTINATION CONTENTS (FULL MIRROR ONLY) =====================
    Log-Header "FULL MIRROR: PREPARING DESTINATION"
    
    # Clear hash cache for full mirror
    if (Test-Path $hashCacheFile) {
        Remove-Item $hashCacheFile -Force -ErrorAction SilentlyContinue
        Log "Cleared hash cache for full mirror" "Gray"
    }
    
    $destContents = Get-ChildItem -LiteralPath $destination -Force -ErrorAction SilentlyContinue
    if ($destContents.Count -gt 0) {
        Write-Host "`nFULL MIRROR MODE: Destination folder contains $($destContents.Count) item(s)" -ForegroundColor Yellow
        Write-Host "This mode will DELETE ALL contents in the destination folder!" -ForegroundColor Yellow
        Write-Host "Folder: $destination" -ForegroundColor Cyan
        Write-Host "`nType 'YES' to delete all contents and proceed, or 'NO' to exit: " -ForegroundColor Yellow -NoNewline
        
        $response = Read-Host
        
        if ($response -eq "YES") {
            Log "`n🗑️ User confirmed deletion - clearing destination..." "Yellow"
            
            $deleteCount = 0
            foreach ($item in $destContents) {
                $relativePath = $item.FullName.Substring($destination.Length).TrimStart('\')
                
                if (Test-ShouldIgnore $relativePath) {
                    Log "  Preserving ignored item: $relativePath" "Gray"
                    continue
                }
                
                try {
                    if ($item.Attributes -band [System.IO.FileAttributes]::ReadOnly) {
                        $item.Attributes = $item.Attributes -bxor [System.IO.FileAttributes]::ReadOnly
                    }
                    
                    Remove-Item -LiteralPath $item.FullName -Recurse -Force -ErrorAction Stop
                    $deleteCount++
                } catch {
                    Log "  Failed to delete: $relativePath - $($_.Exception.Message)" "Red"
                }
            }
            
            Log "✓ Cleared $deleteCount item(s) from destination" "Green"
        } else {
            Log "User chose to cancel - exiting" "Yellow"
            Write-Host "`nPress ENTER to exit..."
            Read-Host
            exit 0
        }
    } else {
        Log "Destination is empty - ready for full mirror" "Green"
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE") {
    # ===================== INCREMENTAL SCAN =====================
    Log-Header "INCREMENTAL UPDATE: SCANNING FOR CHANGES"
    $changes = Get-IncrementalChanges -Source $source -Destination $destination
    
    Log "`nScan Results:" "Cyan"
    Log "  Source files: $($changes.SourceFileCount)" "White"
    Log "  Destination files: $($changes.DestFileCount)" "White"
    Log "  New files to copy: $($changes.ToCopy.Count)" "Green"
    Log "  Changed files to update: $($changes.ToUpdate.Count)" "Yellow"
    Log "  Obsolete files to delete: $($changes.ToDelete.Count)" "Red"
    
    $totalChanges = $changes.ToCopy.Count + $changes.ToUpdate.Count + $changes.ToDelete.Count
    
    if ($totalChanges -eq 0) {
        Log "`n✓ No changes detected - destination is already in sync!" "Green"
        Log "  Skipping file operations" "Green"
    }
}

# ===================== COLLECT FILES TO PROCESS =====================
$filesToProcess = @()
$sourceJunctionsToRecreate = @()

if ($operationMode -eq "FULL_MIRROR") {
    Log-Header "SCANNING SOURCE FILES"
    
    $allSourceItems = Get-ChildItem $source -Recurse -Force -ErrorAction SilentlyContinue
    
    foreach ($item in $allSourceItems) {
        $relativePath = $item.FullName.Substring($source.Length).TrimStart('\')
        
        if (Test-ShouldIgnore $relativePath) {
            continue
        }
        
        if ($item.Attributes -band [System.IO.FileAttributes]::ReparsePoint) {
            if ($recreateJunctions) {
                $sourceJunctionsToRecreate += $item
            }
            continue
        }
        
        if (-not $item.PSIsContainer) {
            if (Test-ShouldExcludeFile $item.Name) {
                continue
            }
            $filesToProcess += $item
        }
    }
    
    $totalFiles = $filesToProcess.Count
    Log "Total files to copy (excluding ignored folders and excluded files): $totalFiles"
    
    if ($sourceJunctionsToRecreate.Count -gt 0) {
        Log "Total junctions to recreate: $($sourceJunctionsToRecreate.Count)" "Cyan"
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE") {
    if ($totalChanges -gt 0) {
        Log-Header "PREPARING FILES FOR INCREMENTAL UPDATE"
        
        $relativePaths = $changes.ToCopy + $changes.ToUpdate
        
        foreach ($relativePath in $relativePaths) {
            $sourcePath = Join-Path $source $relativePath
            if (Test-Path $sourcePath) {
                $item = Get-Item -LiteralPath $sourcePath -Force
                $filesToProcess += $item
            }
        }
        
        $totalFiles = $filesToProcess.Count
        Log "Total files to copy/update: $totalFiles"
    }
}

# ===================== ETA TRACKING =====================
$stopwatch = [System.Diagnostics.Stopwatch]::StartNew()
$lastUpdateTime = $stopwatch.Elapsed.TotalSeconds
$lastProcessedCount = 0

function Update-ETA($processed, $total) {
    $currentTime = $stopwatch.Elapsed.TotalSeconds
    $timeSinceLastUpdate = $currentTime - $script:lastUpdateTime
    
    if ($timeSinceLastUpdate -gt 0) {
        $itemsSinceLastUpdate = $processed - $script:lastProcessedCount
        $itemsPerSecond = $itemsSinceLastUpdate / $timeSinceLastUpdate
        
        if ($itemsPerSecond -gt 0) {
            $itemsRemaining = $total - $processed
            $secondsRemaining = $itemsRemaining / $itemsPerSecond
            
            $script:lastUpdateTime = $currentTime
            $script:lastProcessedCount = $processed
            
            $hours = [math]::Floor($secondsRemaining / 3600)
            $minutes = [math]::Floor(($secondsRemaining % 3600) / 60)
            $seconds = [math]::Floor($secondsRemaining % 60)
            
            if ($hours -gt 99) {
                $days = [math]::Floor($hours / 24)
                $remainingHours = $hours % 24
                return "${days}d ${remainingHours}:$($minutes.ToString('00')):$($seconds.ToString('00'))"
            } else {
                return "$($hours.ToString('00')):$($minutes.ToString('00')):$($seconds.ToString('00'))"
            }
        }
    }
    
    return "Calculating..."
}

# ===================== COPY FILES =====================
if ($filesToProcess.Count -gt 0) {
    Log-Header "COPYING FILES"
    
    $copied = 0
    $failed = @()
    $skipped = @()
    $processed = 0
    $longPathUsed = 0
    $largeFilesProcessed = @()
    
    foreach ($file in $filesToProcess) {
        $relativePath = $file.FullName.Substring($source.Length).TrimStart('\')
        $destFile = Join-Path $destination $relativePath
        
        # Detect large files
        $fileSizeMB = [math]::Round($file.Length / 1MB, 2)
        if ($fileSizeMB -ge $largeFileSizeMB) {
            $largeFilesProcessed += @{
                Path = $relativePath
                SizeMB = $fileSizeMB
            }
            Write-Host "`n🔶 Processing LARGE FILE ($fileSizeMB MB): $relativePath" -ForegroundColor Yellow
        }
        
        # Create parent directory
        $parentDir = Split-Path $destFile
        if (-not (Test-Path -LiteralPath $parentDir)) {
            try {
                New-Item -ItemType Directory -Path $parentDir -Force | Out-Null
            } catch {
                if ($_.Exception.Message -match "PathTooLong" -or $_.Exception.Message -match "path.*too long") {
                    $longParentPath = Get-LongPath $parentDir
                    New-Item -ItemType Directory -Path $longParentPath -Force | Out-Null
                } else {
                    throw
                }
            }
        }
        
        $success = $false
        $usedLongPath = $false
        $copyResult = $null
        
        for ($attempt = 1; $attempt -le $maxRetries -and -not $success; $attempt++) {
            try {
                # Copy file with lock handling
                $copyResult = Copy-FileWithLockHandling -sourcePath $file.FullName -destPath $destFile
                
                switch ($copyResult) {
                    "SKIPPED" {
                        $skipped += $relativePath
                        Log "  ✓ Skipped locked file: $relativePath" "Yellow"
                        break  # Exit retry loop
                    }
                    "FAILED_LOCKED" {
                        if ($attempt -eq $maxRetries) {
                            $skipped += $relativePath
                            Log "  ⚠️  Could not copy locked file (non-log): $relativePath" "Yellow"
                        }
                        Start-Sleep -Seconds 1
                        continue
                    }
                    {$_ -in @("COPIED_NORMAL", "COPIED_WITH_SHARING", "COPIED_LONGPATH")} {
                        if ($_ -eq "COPIED_LONGPATH") {
                            $usedLongPath = $true
                        }
                        
                        # Verify hash
                        if ($fileSizeMB -ge $largeFileSizeMB) {
                            Write-Host "  Verifying hash..." -ForegroundColor Gray
                        }
                        
                        $sourceHash = (Get-FileHash -LiteralPath $file.FullName -Algorithm SHA256 -ErrorAction Stop).Hash
                        $destHash = (Get-FileHash -LiteralPath $destFile -Algorithm SHA256 -ErrorAction Stop).Hash
                        
                        if ($sourceHash -eq $destHash) {
                            $success = $true
                            $copied++
                            
                            # Update hash cache
                            Update-HashCache -cache $hashCache -relativePath $relativePath `
                                -hash $sourceHash -size $file.Length -lastModified $file.LastWriteTime
                            
                            if ($fileSizeMB -ge $largeFileSizeMB) {
                                Write-Host "  ✓ Large file verified successfully" -ForegroundColor Green
                            }
                            if ($usedLongPath) {
                                $longPathUsed++
                            }
                        } else {
                            Log "  Hash mismatch (attempt $attempt): $relativePath" "Yellow"
                            Remove-Item $destFile -Force -ErrorAction SilentlyContinue
                        }
                    }
                    default {
                        Log "  Copy failed (attempt $attempt): $relativePath" "Yellow"
                    }
                }
            } catch {
                Log "  Error (attempt $attempt): $relativePath - $($_.Exception.Message)" "Yellow"
            }
            
            if (-not $success -and $copyResult -ne "SKIPPED" -and $attempt -lt $maxRetries) {
                Start-Sleep -Seconds 1
            }
        }
        
        if (-not $success -and $copyResult -ne "SKIPPED") {
            $failed += $relativePath
            Log "  ✗ PERMANENT FAILURE: $relativePath" "Red"
        }
        
        # Progress update
        $processed++
        if ($processed % $progressInterval -eq 0 -or $processed -eq $totalFiles) {
            $eta = Update-ETA $processed $totalFiles
            $pct = [math]::Round(($processed / $totalFiles) * 100, 1)
            $status = "Progress: $processed/$totalFiles ($pct%) - Copied: $copied"
            if ($failed.Count -gt 0) { $status += " - Failed: $($failed.Count)" }
            if ($skipped.Count -gt 0) { $status += " - Skipped: $($skipped.Count)" }
            $status += " - ETA: $eta"
            Write-Host $status -ForegroundColor Cyan
        }
    }
    
    # Save hash cache after successful copies
    if ($copied -gt 0) {
        Save-HashCache -cache $hashCache
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $filesToProcess.Count -eq 0) {
    $copied = 0
    $failed = @()
    $skipped = @()
    $longPathUsed = 0
    $largeFilesProcessed = @()
    $stopwatch = [System.Diagnostics.Stopwatch]::StartNew()
}

# ===================== DELETE EXTRA FILES =====================
if ($operationMode -eq "FULL_MIRROR") {
    Log-Header "CLEANING UP EXTRA FILES (FULL MIRROR)"
    Log "Checking for extra files in destination..." "Gray"

    $destItems = Get-ChildItem $destination -Recurse -Force -ErrorAction SilentlyContinue
    $deletedCount = 0
    $ignoredCount = 0

    foreach ($item in $destItems) {
        $relativePath = $item.FullName.Substring($destination.Length).TrimStart('\')
        
        if (Test-ShouldIgnore $relativePath) {
            $ignoredCount++
            continue
        }
        
        $sourcePath = Join-Path $source $relativePath
        if (-not (Test-Path -LiteralPath $sourcePath)) {
            try {
                if ($item.Attributes -band [System.IO.FileAttributes]::ReadOnly) {
                    $item.Attributes = $item.Attributes -bxor [System.IO.FileAttributes]::ReadOnly
                }
                
                try {
                    if ($item.PSIsContainer) {
                        Remove-Item -LiteralPath $item.FullName -Recurse -Force -ErrorAction Stop
                    } else {
                        Remove-Item -LiteralPath $item.FullName -Force -ErrorAction Stop
                    }
                } catch {
                    if ($_.Exception.Message -match "PathTooLong" -or $_.Exception.Message -match "path.*too long") {
                        $longPath = Get-LongPath $item.FullName
                        if ($item.PSIsContainer) {
                            Remove-Item -LiteralPath $longPath -Recurse -Force -ErrorAction Stop
                        } else {
                            Remove-Item -LiteralPath $longPath -Force -ErrorAction Stop
                        }
                    } else {
                        throw
                    }
                }
                
                $deletedCount++
            } catch {
                Log "  FAILED to delete: $relativePath - $($_.Exception.Message)" "Red"
            }
        }
    }

    if ($deletedCount -gt 0) {
        Log "✓ Deleted $deletedCount extra item(s)" "Green"
    } else {
        Log "✓ No extra items found" "Green"
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $changes.ToDelete.Count -gt 0) {
    Log-Header "DELETING OBSOLETE FILES (INCREMENTAL UPDATE)"
    Log "Deleting $($changes.ToDelete.Count) file(s) that no longer exist in source..." "Yellow"
    
    $deletedCount = 0
    $deleteFailed = @()
    
    foreach ($relativePath in $changes.ToDelete) {
        $destPath = Join-Path $destination $relativePath
        
        if (Test-ShouldIgnore $relativePath) {
            continue
        }
        
        if (Test-Path $destPath) {
            try {
                $item = Get-Item -LiteralPath $destPath -Force
                if ($item.Attributes -band [System.IO.FileAttributes]::ReadOnly) {
                    $item.Attributes = $item.Attributes -bxor [System.IO.FileAttributes]::ReadOnly
                }
                
                Remove-Item -LiteralPath $destPath -Force -ErrorAction Stop
                $deletedCount++
                
                # Remove from hash cache
                if ($hashCache.ContainsKey($relativePath)) {
                    $hashCache.Remove($relativePath)
                }
            } catch {
                $deleteFailed += $relativePath
                Log "  FAILED to delete: $relativePath - $($_.Exception.Message)" "Red"
            }
        }
    }
    
    if ($deletedCount -gt 0) {
        Log "✓ Deleted $deletedCount obsolete file(s)" "Green"
        Save-HashCache -cache $hashCache
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE") {
    Log "No obsolete files to delete." "Green"
}

# ===================== RECREATE JUNCTIONS =====================
# ===================== SUMMARY =====================
$stopwatch.Stop()
Log-Header "MIRROR SUMMARY"

# Get file statistics
$allSourceFiles = Get-ChildItem $source -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
    $relativePath = $_.FullName.Substring($source.Length).TrimStart('\')
    -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
}
$sourceSize = ($allSourceFiles | Measure-Object Length -Sum).Sum / 1GB

$allDestFiles = Get-ChildItem $destination -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
    $relativePath = $_.FullName.Substring($destination.Length).TrimStart('\')
    -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
}
$destSize = ($allDestFiles | Measure-Object Length -Sum).Sum / 1GB

Log "Operation Mode: $operationMode"
Log "Source Statistics (excluding ignored folders and excluded files):"
Log "  Files: $($allSourceFiles.Count)"
Log "  Size:  $([math]::Round($sourceSize, 2)) GB"

Log "`nDestination Statistics (excluding ignored folders and excluded files):"
Log "  Files: $($allDestFiles.Count)"
Log "  Size:  $([math]::Round($destSize, 2)) GB"

# ===================== DETAILED FILE LISTS =====================
Log "`n=== DETAILED FILE OPERATIONS ===" "Cyan"

# List successfully copied files
$successfullyCopiedFiles = @()
if ($operationMode -eq "FULL_MIRROR") {
    # In full mirror mode, all files in $filesToProcess should be copied
    $successfullyCopiedFiles = $filesToProcess | ForEach-Object {
        $relativePath = $_.FullName.Substring($source.Length).TrimStart('\')
        @{
            Path = $relativePath
            SizeMB = [math]::Round($_.Length / 1MB, 2)
        }
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $changes.ToCopy.Count -gt 0) {
    $successfullyCopiedFiles = $changes.ToCopy | ForEach-Object {
        $sourcePath = Join-Path $source $_
        if (Test-Path $sourcePath) {
            $item = Get-Item -LiteralPath $sourcePath -Force -ErrorAction SilentlyContinue
            if ($item) {
                @{
                    Path = $_
                    SizeMB = [math]::Round($item.Length / 1MB, 2)
                }
            }
        }
    }
}

# Add updated files from incremental mode
if ($operationMode -eq "INCREMENTAL_UPDATE" -and $changes.ToUpdate.Count -gt 0) {
    $updatedFiles = $changes.ToUpdate | ForEach-Object {
        $sourcePath = Join-Path $source $_
        if (Test-Path $sourcePath) {
            $item = Get-Item -LiteralPath $sourcePath -Force -ErrorAction SilentlyContinue
            if ($item) {
                @{
                    Path = $_
                    SizeMB = [math]::Round($item.Length / 1MB, 2)
                    Action = "Updated"
                }
            }
        }
    }
    $successfullyCopiedFiles += $updatedFiles
}

# List deleted files
$deletedFilesList = @()
if ($operationMode -eq "FULL_MIRROR") {
    # Get deleted files from earlier cleanup
    $deletedFilesList = $destItems | Where-Object {
        $relativePath = $_.FullName.Substring($destination.Length).TrimStart('\')
        if (Test-ShouldIgnore $relativePath) { return $false }
        $sourcePath = Join-Path $source $relativePath
        -not (Test-Path -LiteralPath $sourcePath)
    } | ForEach-Object {
        @{
            Path = $_.FullName.Substring($destination.Length).TrimStart('\')
            SizeMB = if ($_.PSIsContainer) { 0 } else { [math]::Round($_.Length / 1MB, 2) }
        }
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $changes.ToDelete.Count -gt 0) {
    $deletedFilesList = $changes.ToDelete | ForEach-Object {
        $destPath = Join-Path $destination $_
        if (Test-Path $destPath -ErrorAction SilentlyContinue) {
            $item = Get-Item -LiteralPath $destPath -Force -ErrorAction SilentlyContinue
            if ($item) {
                @{
                    Path = $_
                    SizeMB = if ($item.PSIsContainer) { 0 } else { [math]::Round($item.Length / 1MB, 2) }
                }
            } else {
                @{
                    Path = $_
                    SizeMB = 0
                }
            }
        }
    }
}

# Display copied files
if ($successfullyCopiedFiles.Count -gt 0) {
    Log "`n✅ SUCCESSFULLY COPIED/UPDATED FILES ($($successfullyCopiedFiles.Count)):" "Green"
    
    # Sort by path for readability
    $successfullyCopiedFiles = $successfullyCopiedFiles | Sort-Object -Property Path
    
    # Show all files if less than 50, otherwise show top 20
    $maxToShow = if ($successfullyCopiedFiles.Count -le 50) { $successfullyCopiedFiles.Count } else { 20 }
    
    for ($i = 0; $i -lt $maxToShow; $i++) {
        $file = $successfullyCopiedFiles[$i]
        $actionText = if ($file.Action) { "[$($file.Action)] " } else { "" }
        Log "  $($i+1). $($file.SizeMB) MB - $actionText$($file.Path)" "White"
    }
    
    if ($successfullyCopiedFiles.Count -gt $maxToShow) {
        Log "  ... and $($successfullyCopiedFiles.Count - $maxToShow) more files" "Gray"
    }
    
    # Save full list to a CSV file
    $copiedListFile = Join-Path $destination "mirror_copied_files_$(Get-Date -Format 'yyyyMMdd_HHmmss').csv"
    try {
        $successfullyCopiedFiles | Export-Csv -Path $copiedListFile -NoTypeInformation
        Log "  Full list saved to: $copiedListFile" "Gray"
    } catch {
        Log "  Could not save copied files list: $($_.Exception.Message)" "Yellow"
    }
} else {
    Log "`nNo files were copied or updated." "Gray"
}

# Display deleted files
if ($deletedFilesList.Count -gt 0) {
    Log "`n🗑️  DELETED FILES ($($deletedFilesList.Count)):" "Yellow"
    
    # Sort by path for readability
    $deletedFilesList = $deletedFilesList | Sort-Object -Property Path
    
    # Show all files if less than 50, otherwise show top 20
    $maxToShow = if ($deletedFilesList.Count -le 50) { $deletedFilesList.Count } else { 20 }
    
    for ($i = 0; $i -lt $maxToShow; $i++) {
        $file = $deletedFilesList[$i]
        $sizeText = if ($file.SizeMB -gt 0) { "$($file.SizeMB) MB - " } else { "" }
        Log "  $($i+1). ${sizeText}$($file.Path)" "Gray"
    }
    
    if ($deletedFilesList.Count -gt $maxToShow) {
        Log "  ... and $($deletedFilesList.Count - $maxToShow) more files" "Gray"
    }
    
    # Save full list to a CSV file
    $deletedListFile = Join-Path $destination "mirror_deleted_files_$(Get-Date -Format 'yyyyMMdd_HHmmss').csv"
    try {
        $deletedFilesList | Export-Csv -Path $deletedListFile -NoTypeInformation
        Log "  Full list saved to: $deletedListFile" "Gray"
    } catch {
        Log "  Could not save deleted files list: $($_.Exception.Message)" "Yellow"
    }
} else {
    Log "`nNo files were deleted." "Gray"
}

# Rest of the existing summary continues...
if ($operationMode -eq "INCREMENTAL_UPDATE") {
    Log "`nIncremental Update Results:"
    Log "  New files copied: $($changes.ToCopy.Count)" "Green"
    Log "  Updated files: $($changes.ToUpdate.Count)" "Green"
    Log "  Deleted files: $deletedCount" "Green"
    if ($script:cacheHits -gt 0) {
        $cacheEfficiency = [math]::Round(($script:cacheHits / ($script:cacheHits + $script:cacheMisses)) * 100, 1)
        Log "  Hash cache efficiency: $cacheEfficiency% ($($script:cacheHits) hits)" "Cyan"
    }
}

Log "`nFile Operations:"
Log "  ✓ Files copied/updated: $copied" "Green"
if ($skipped.Count -gt 0) {
    Log "  ⚠️  Files skipped (locked): $($skipped.Count)" "Yellow"
    if ($skipped.Count -le 10) {
        $skipped | ForEach-Object { Log "    - $_" "Gray" }
    }
}
if ($failed.Count -gt 0) {
    Log "  ✗ Files failed: $($failed.Count)" "Red"
    if ($failed.Count -le 10) {
        $failed | ForEach-Object { Log "    - $_" "Red" }
    }
} else {
    Log "  ✗ Files failed: 0" "Green"
}
Log "  ⚡ Long paths used: $longPathUsed" $(if($longPathUsed -gt 0){"Yellow"}else{"White"})

Log "`nTotal time: $($stopwatch.Elapsed.ToString('hh\:mm\:ss'))"

if ($largeFilesProcessed.Count -gt 0) {
    Log-Header "LARGE FILES SUMMARY"
    Log "Found $($largeFilesProcessed.Count) file(s) >= $largeFileSizeMB MB:" "Yellow"
    
    $largeFilesSorted = $largeFilesProcessed | Sort-Object -Property SizeMB -Descending | Select-Object -First 10
    foreach ($largeFile in $largeFilesSorted) {
        Log "  $($largeFile.SizeMB) MB - $($largeFile.Path)" "Cyan"
    }
}


# ===================== OPTIONAL FINAL HASH CHECK =====================
Write-Host "`n=== HASH CHECK DEBUG ===" -ForegroundColor Cyan
Write-Host "runFinalHashCheck: $runFinalHashCheck" -ForegroundColor Cyan
Write-Host "failed.Count: $($failed.Count)" -ForegroundColor Cyan
Write-Host "skipped.Count: $($skipped.Count)" -ForegroundColor Cyan

if ($runFinalHashCheck -and $failed.Count -eq 0) {
    Log-Header "FINAL VERIFICATION"
    Log "Computing folder hashes (excluding ignored folders and excluded files)..."
    Log "This may take several minutes..."
    
    function Get-FolderHash-WithProgress($folder, $operation) {
        $allFiles = @(Get-ChildItem $folder -Recurse -File -Force -ErrorAction SilentlyContinue | 
                     Where-Object {
                         $relativePath = $_.FullName.Substring($folder.Length).TrimStart('\')
                         -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
                     })
        
        $totalFiles = $allFiles.Count
        Log "  Found $totalFiles files to hash for $operation" "Gray"
        
        if ($totalFiles -eq 0) {
            return "NO_FILES"
        }
        
        $sortedFiles = $allFiles | Sort-Object FullName
        $hashAlgorithm = [System.Security.Cryptography.SHA256]::Create()
        $combinedHash = [System.Text.StringBuilder]::new()
        $hashedFiles = 0
        $startTime = Get-Date
        $progressInterval = [math]::Max(1, [math]::Round($totalFiles / 50))  # Update every ~2%
        
       


        for ($i = 0; $i -lt $sortedFiles.Count; $i++) {
            $file = $sortedFiles[$i]
            
            # Show progress
            if ($i -eq 0 -or $i -eq ($sortedFiles.Count - 1) -or ($i % $progressInterval -eq 0)) {
                $percentComplete = [math]::Round(($i / $totalFiles) * 100, 1)
                $elapsed = (Get-Date) - $startTime
                
                if ($percentComplete -gt 0) {
                    $totalEstimatedSeconds = ($elapsed.TotalSeconds / $percentComplete) * 100
                    $remainingSeconds = $totalEstimatedSeconds - $elapsed.TotalSeconds
                    $eta = [timespan]::FromSeconds($remainingSeconds)
                    $etaDisplay = "$($eta.Hours.ToString('00')):$($eta.Minutes.ToString('00')):$($eta.Seconds.ToString('00'))"
                    Write-Host "  Hashing ${operation}: $percentComplete% ($i/$totalFiles) - ETA: $etaDisplay" -ForegroundColor Gray
                } else {
                    Write-Host "  Hashing ${operation}: $percentComplete% ($i/$totalFiles)" -ForegroundColor Gray
                }
            }
            
            try {
                $fileHash = (Get-FileHash -LiteralPath $file.FullName -Algorithm SHA256 -ErrorAction Stop).Hash
                $relativePath = $file.FullName.Substring($folder.Length).TrimStart('\')
                $combinedHash.Append($relativePath.ToLower()) | Out-Null
                $combinedHash.Append($fileHash) | Out-Null
                $hashedFiles++
            } catch {
                # Skip files that can't be hashed
            }
        }
        
        Write-Host "  Hashing ${operation}: 100% ($totalFiles/$totalFiles) - Complete!" -ForegroundColor Green
        
        $finalHashBytes = $hashAlgorithm.ComputeHash([System.Text.Encoding]::UTF8.GetBytes($combinedHash.ToString()))
        $finalHash = [System.BitConverter]::ToString($finalHashBytes) -replace '-', ''
        $hashAlgorithm.Dispose()
        
        return $finalHash
    }
    
    try {
        $hashStartTime = Get-Date
        $sourceHash = Get-FolderHash-WithProgress -folder $source -operation "source"
        $sourceHashTime = (Get-Date) - $hashStartTime
        
        $destHashStartTime = Get-Date
        $destHash = Get-FolderHash-WithProgress -folder $destination -operation "destination"
        $destHashTime = (Get-Date) - $destHashStartTime
        
        Log "`nHash Comparison:" "Cyan"
        Log "  Source hash:      $sourceHash" "Gray"
        Log "  Destination hash: $destHash" "Gray"
        
        if ($sourceHash -eq $destHash) {
            Log "`n✅ PERFECT MIRROR CONFIRMED!" "Green"
            Log "   Source and destination are identical" "Green"
            Log "   Hash time: $([math]::Round(($sourceHashTime + $destHashTime).TotalMinutes, 2)) minutes" "Gray"
        } else {
            Log "`n⚠️  Hash mismatch detected" "Red"
            Log "   Files may be different or some were skipped" "Red"
        }
        
    } catch {
        Log "ERROR during hash check: $($_.Exception.Message)" "Red"
    }
    
} elseif (-not $runFinalHashCheck) {
    Log-Header "HASH CHECK SKIPPED"
    Log "⏭️  Final hash verification was skipped (user choice)" "Yellow"
} elseif ($failed.Count -gt 0) {
    Log-Header "HASH CHECK SKIPPED"
    Log "⏭️  Final hash verification skipped due to $($failed.Count) failed file(s)" "Yellow"
} elseif ($skipped.Count -gt 0) {
    Log-Header "HASH CHECK SKIPPED"
    Log "⏭️  Final hash verification skipped due to $($skipped.Count) skipped file(s)" "Yellow"
    Log "Note: Skipped files are typically locked log files" "Gray"
}

# ===================== FINAL STATUS =====================
Log-Header "MIRROR COMPLETED"

if ($failed.Count -eq 0 -and $skipped.Count -eq 0) {
    if ($runFinalHashCheck -and $sourceHash -eq $destHash) {
        Log "✅ SUCCESS - FULL MIRROR VERIFIED!" "Green"
        Log "   All files copied and hash verification passed." "Green"
    } else {
        Log "✅ SUCCESS - $operationMode completed successfully!" "Green"
        if ($operationMode -eq "INCREMENTAL_UPDATE") {
            $totalProcessed = $changes.ToCopy.Count + $changes.ToUpdate.Count + $deletedCount
            Log "   $totalProcessed item(s) were processed." "Green"
        }
    }
} elseif ($skipped.Count -gt 0 -and $failed.Count -eq 0) {
    Log "✅ SUCCESS WITH WARNINGS" "Yellow"
    Log "   $copied file(s) copied, $skipped file(s) skipped (locked)" "Yellow"
    Log "   Skipped files are typically log files in use by applications" "Gray"
} else {
    Log "⚠️  COMPLETED WITH ERRORS" "Red"
    if ($failed.Count -gt 0) { Log "   $($failed.Count) file(s) failed to copy" "Red" }
    if ($skipped.Count -gt 0) { Log "   $($skipped.Count) file(s) skipped (locked)" "Yellow" }
}

Log "`nLog file: $logFile"

Write-Host "`nPress ENTER to exit..."
Read-Host