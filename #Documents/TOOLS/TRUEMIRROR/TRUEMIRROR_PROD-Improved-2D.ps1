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

- STORAGE FOLDER SKIP OPTION for incremental updates

- NO ADMIN RIGHTS REQUIRED


How to run:

1. Open PowerShell 7+ (no admin required)

2. Run: .\TRUEMIRROR_PROD-Improved-2D.ps1

3. Log file: "D:\enhanced_mirrorXamppToD.log" 

#>


# ===================== CONFIG =====================

$source = "C:\xampp\htdocs\pmway.hopto.org"        # Source folder

$destination = "E:\pmway.hopto.org"   # Destination folder

$logFile = "E:\enhanced_mirrorXamppToE.log"      # Log file location

$maxRetries = 3                          # Max retries per file

$progressInterval = 10                   # Progress update frequency (every N files)

$enableFinalHashCheck = $true            # Final folder hash verification (can be overridden for incremental)

$recreateJunctions = $false              # Recreate junctions properly

$largeFileSizeMB = 50                    # Show progress for files larger than this (MB)


# ===================== IGNORE RULES (SOURCE) =====================

$script:ignoreFoldersInDest = @(

    ".git",

    "storage\framework\cache",  # Fixed: removed trailing backslash

    "storage\framework\sessions",  # Fixed: removed trailing backslash

    "storage\framework\views"  # Fixed: removed trailing backslash


)


# ===================== FILE EXCLUSION RULES =====================

$script:excludeFiles = @(

    # Add common locked files here to skip them entirely

    "laravel.log",

    "*.tmp",

    "*.temp"

)


# ===================== HASH CACHE CONFIG =====================

$script:hashCacheFile = Join-Path $destination ".mirror_hash_cache.json"

$script:useHashCache = $true  # Enable hash caching for faster incremental scans


# ===================== REPORTS FOLDER CONFIG =====================

$reportsBaseFolder = "D:\MirrorReports"


# ===================== TRACKING ARRAYS =====================

$script:addedFiles = @()

$script:deletedFiles = @()

$script:updatedFiles = @()

# ===================== GUITAR SCORES TRACKING =====================
$script:guitarScoresPath = "storage\app\protectedGuitar"
$script:addedGuitarFiles = @()
$script:deletedGuitarFiles = @()
$script:updatedGuitarFiles = @()


# ===================== OPERATION MODE SELECTION =====================

Clear-Host

Write-Host "======================================================" -ForegroundColor Cyan

Write-Host "       ENHANCED MIRROR SCRIPT - MODE SELECTION        " -ForegroundColor Cyan

Write-Host "======================================================" -ForegroundColor Cyan

Write-Host ""

Write-Host "Please select the operation mode:" -ForegroundColor Yellow

Write-Host ""

Write-Host "F - FULL MIRROR - Delete everything in destination and create fresh copy" -ForegroundColor White

Write-Host "    ✓ Guarantees perfect mirror" -ForegroundColor Gray

Write-Host "    ⚠️  Slower, high disk I/O, deletes all existing files" -ForegroundColor Gray

Write-Host ""

Write-Host "I - INCREMENTAL UPDATE - Only copy changed files" -ForegroundColor White

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


# ===================== STORAGE FOLDER SKIP OPTION =====================

$skipStorageFolder = $false


if ($operationMode -eq "INCREMENTAL_UPDATE") {

    Write-Host ""

    Write-Host "======================================================" -ForegroundColor Cyan

    Write-Host "           STORAGE FOLDER OPTION                      " -ForegroundColor Cyan

    Write-Host "======================================================" -ForegroundColor Cyan

    Write-Host ""

    Write-Host "The 'storage' folder can be very large. For incremental updates," -ForegroundColor Yellow

    Write-Host "you can skip it to save time if you haven't made changes there." -ForegroundColor Yellow

    Write-Host ""

    Write-Host "Include 'storage' folder in this incremental update?" -ForegroundColor Yellow

    Write-Host ""

    Write-Host "Y - Yes - Include storage folder - full sync" -ForegroundColor White

    Write-Host "N - No  - Skip storage folder - faster, use if unchanged" -ForegroundColor White

    Write-Host ""

    Write-Host "Enter Y or N: " -ForegroundColor Yellow -NoNewline

   

    do {

        $storageChoice = Read-Host

        $storageChoice = $storageChoice.ToUpper()

        if ($storageChoice -notin @('Y', 'N')) {

            Write-Host "Invalid selection. Please enter Y or N: " -ForegroundColor Red -NoNewline

        }

    } while ($storageChoice -notin @('Y', 'N'))

   


    $skipStorageFolder = ($storageChoice -eq 'N')


   

    if ($skipStorageFolder) {

        Write-Host "⚡ Storage folder will be skipped (faster incremental update)" -ForegroundColor Yellow

        # Add storage to ignore list temporarily for this run - FIXED: use correct variable name

        $script:ignoreFoldersInDest += "storage"

    } else {

        Write-Host "✓ Storage folder will be included" -ForegroundColor Green

    }

}


# ===================== HASH CHECK OPTION =====================

$runFinalHashCheck = $enableFinalHashCheck


# Always show hash check option for incremental mode

if ($operationMode -eq "INCREMENTAL_UPDATE") {

    Write-Host ""

    Write-Host "======================================================" -ForegroundColor Cyan

    Write-Host "           HASH CHECK OPTION (INCREMENTAL)            " -ForegroundColor Cyan

    Write-Host "======================================================" -ForegroundColor Cyan

   

    Write-Host ""

    Write-Host "Hash checking verifies ALL files match - takes time but ensures accuracy." -ForegroundColor Yellow

    Write-Host "With hash caching, incremental scans are faster but final check still takes time." -ForegroundColor Yellow

    Write-Host ""

    Write-Host "Run final hash check after this incremental update?" -ForegroundColor Yellow

    Write-Host ""

    Write-Host "Y - Yes - Run hash check - slower, verifies everything" -ForegroundColor White

    Write-Host "N - No  - Skip hash check - faster, trust incremental scan" -ForegroundColor White

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

if ($skipStorageFolder) {

    Write-Host "[DEBUG] Storage folder will be skipped" -ForegroundColor Magenta

}


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

$script:hashCache = Get-HashCache

$script:cacheHits = 0

$script:cacheMisses = 0


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


# ===================== IMPROVED IGNORE LOGIC =====================

function Test-ShouldIgnore($relativePath) {

    # Normalize path separators

    $normalizedPath = $relativePath.TrimStart('\').Replace('/', '\')

   

    foreach ($pattern in $script:ignoreFoldersInDest) {

        # Normalize the pattern too

        $normalizedPattern = $pattern.TrimStart('\').TrimEnd('\').Replace('/', '\')

   

        # Check if path starts with the pattern or contains it as a folder

        if ($normalizedPath -eq $normalizedPattern -or 

            $normalizedPath.StartsWith("$normalizedPattern\", [StringComparison]::OrdinalIgnoreCase) -or

            $normalizedPath -like "$normalizedPattern\*") {

            return $true

        }

  

        # Also check if any parent folder matches

        $pathParts = $normalizedPath -split '\\'

        $patternParts = $normalizedPattern -split '\\'

  

        # Check if the pattern matches any portion of the path

        for ($i = 0; $i -le ($pathParts.Count - $patternParts.Count); $i++) {

            $match = $true

            for ($j = 0; $j -lt $patternParts.Count; $j++) {

                if ($pathParts[$i + $j] -ne $patternParts[$j]) {

                    $match = $false

                    break

                }

            }

            if ($match) {

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


# ===================== ROBUST FILE SCANNER =====================

function Get-FilesRecursive {
    param(
        [string]$Path,
        [string]$Description = "directory"
    )
    
    $files = @()
    $queue = New-Object System.Collections.Queue
    $queue.Enqueue($Path)
    $processedCount = 0
    
    while ($queue.Count -gt 0) {
        $currentPath = $queue.Dequeue()
        
        try {
            # Get items in current directory
            $items = @(Get-ChildItem -LiteralPath $currentPath -Force -ErrorAction Stop)
            
            foreach ($item in $items) {
                try {
                    if ($item.PSIsContainer) {
                        # Add subdirectory to queue
                        $queue.Enqueue($item.FullName)
                    } else {
                        # It's a file - add to results
                        $files += $item
                        $processedCount++
                        
                        if ($processedCount % 1000 -eq 0) {
                            Write-Host "`r  Scanned: $processedCount files..." -NoNewline -ForegroundColor Gray
                        }
                    }
                } catch {
                    # Skip individual items that can't be accessed
                    continue
                }
            }
        } catch [System.UnauthorizedAccessException] {
            # Skip directories we don't have permission to access
            continue
        } catch [System.IO.IOException] {
            # Skip directories with I/O errors
            continue
        } catch {
            # Skip any other problematic directories
            if ($_.Exception.Message -notlike "*cannot find*file*") {
                Write-Host "`r  Warning: Could not access $currentPath" -ForegroundColor Yellow
            }
            continue
        }
    }
    
    if ($processedCount -gt 0) {
        Write-Host "`r  ✓ Scanned: $processedCount files from $Description" -ForegroundColor Green
    }
    
    return $files
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

  

    # Scan source files with robust error handling

    Log "Scanning source directory..." "Gray"

    $sourceFiles = @(Get-FilesRecursive -Path $Source -Description "source" | Where-Object {
        $relativePath = $_.FullName.Substring($Source.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    })

    Log "  Found $($sourceFiles.Count) files in source (after filters)" "Gray"

  

    # Scan destination files with robust error handling

    Log "Scanning destination directory..." "Gray"

    $destFiles = @(Get-FilesRecursive -Path $Destination -Description "destination" | Where-Object {
        $relativePath = $_.FullName.Substring($Destination.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    })

    Log "  Found $($destFiles.Count) files in destination (after filters)" "Gray"

  

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

  

    Log "Comparing files (with hash cache)..." "Gray"

    $comparedFiles = 0

    $totalComparisons = $sourceFileInfo.Count

  

    foreach ($relativePath in $sourceFileInfo.Keys) {

        $comparedFiles++

        if ($comparedFiles % 100 -eq 0) {

            Write-Host "  Compared $comparedFiles/$totalComparisons files..." -ForegroundColor Gray

        }

  

        $sourceFile = $sourceFileInfo[$relativePath]

  

        if (-not $destFileInfo.ContainsKey($relativePath)) {

            $filesToCopy += $relativePath

        } else {

            $destFile = $destFileInfo[$relativePath]

  

            if ($sourceFile.Size -ne $destFile.Size -or 

                $sourceFile.LastWriteTime -ne $destFile.LastWriteTime) {

  

                # Try cache first

                $sourceHash = Get-CachedHash -cache $script:hashCache `

                    -relativePath $relativePath `

                    -currentSize $sourceFile.Size `

                    -currentLastModified $sourceFile.LastWriteTime

  

                if ($null -eq $sourceHash) {

                    $sourceHash = (Get-FileHash -LiteralPath $sourceFile.Path -Algorithm SHA256 -ErrorAction SilentlyContinue).Hash

                    $script:cacheMisses++

                } else {

                    $script:cacheHits++

                }

  

                $destHash = (Get-FileHash -LiteralPath $destFile.Path -Algorithm SHA256 -ErrorAction SilentlyContinue).Hash

  

                if ($sourceHash -ne $destHash) {

                    $filesToUpdate += $relativePath

                }

            }

        }

    }

  

    Log "Finding files to delete..." "Gray"

    foreach ($relativePath in $destFileInfo.Keys) {

        if (-not $sourceFileInfo.ContainsKey($relativePath)) {

            $filesToDelete += $relativePath

        }

    }

  

    return @{

        ToCopy = $filesToCopy

        ToUpdate = $filesToUpdate

        ToDelete = $filesToDelete

        SourceFileCount = $sourceFiles.Count

        DestFileCount = $destFiles.Count

    }

}


# ===================== LOGGING =====================

function Log($message, $color = "White") {

    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"

    $logMessage = "[$timestamp] $message"

    Write-Host $message -ForegroundColor $color

    Add-Content -Path $script:logFile -Value $logMessage -Force

}


function Log-Header($text) {

    $line = "=" * 60

    Log "`n$line" "Cyan"

    Log $text "Cyan"

    Log "$line" "Cyan"

}


# ===================== SCRIPT START =====================

if (Test-Path $logFile) {

    Remove-Item $logFile -Force

}


$reportDate = Get-Date -Format "yyyy-MM-dd_HHmmss"

$reportsFolder = Join-Path $reportsBaseFolder "MirrorReport_$reportDate"

New-Item -ItemType Directory -Path $reportsFolder -Force | Out-Null


Log-Header "MIRROR SCRIPT STARTED"

Log "Mode: $operationMode"

Log "Source: $source"

Log "Destination: $destination"

Log "Reports Folder: $reportsFolder"

Log "Log file: $logFile"

if ($skipStorageFolder) {

    Log "Storage folder: SKIPPED (faster incremental)" "Yellow"

}


# ===================== OPERATION MODE LOGIC =====================

if ($operationMode -eq "FULL_MIRROR") {

    # ===================== FULL MIRROR: DELETE DESTINATION FIRST =====================

    Log-Header "FULL MIRROR: CLEARING DESTINATION"

  

    $destContents = @()

    try {

        $destContents = @(Get-ChildItem -LiteralPath $destination -Force -ErrorAction Stop)

    } catch {

        # Destination might not exist or be empty

        $destContents = @()

    }

  

    if ($destContents.Count -gt 0) {

        Log "WARNING: This will DELETE ALL contents in:" "Yellow"

        Log "  $destination" "Yellow"

        Log "  Files/Folders to delete: $($destContents.Count)" "Yellow"

        Write-Host ""

        Write-Host "======================================================" -ForegroundColor Red

        Write-Host "           ⚠️  DESTRUCTIVE OPERATION WARNING  ⚠️           " -ForegroundColor Red

        Write-Host "======================================================" -ForegroundColor Red

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

  

    Log "Scanning source directory with robust error handling..." "Gray"

    $allSourceItems = @()

    $queue = New-Object System.Collections.Queue

    $queue.Enqueue($source)

    

    while ($queue.Count -gt 0) {

        $currentPath = $queue.Dequeue()

        

        try {

            $items = @(Get-ChildItem -LiteralPath $currentPath -Force -ErrorAction Stop)

            

            foreach ($item in $items) {

                try {

                    if ($item.PSIsContainer) {

                        $queue.Enqueue($item.FullName)

                    }

                    $allSourceItems += $item

                } catch {

                    continue

                }

            }

        } catch {

            continue

        }

    }

    

    Log "  Found $($allSourceItems.Count) total items" "Gray"

  

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


# ===================== SUCCESSFULLY COPIED FILES TRACKING =====================

$successfullyCopiedFiles = @()


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

        $isUpdate = Test-Path -LiteralPath $destFile

  

        # Detect large files

        $fileSizeMB = [math]::Round($file.Length / 1MB, 2)

        if ($fileSizeMB -ge $largeFileSizeMB) {

            $largeFilesProcessed += @{

                Path = $relativePath

                SizeMB = $fileSizeMB

            }

            Write-Host "`nProcessing LARGE FILE: $fileSizeMB MB - $relativePath" -ForegroundColor Yellow

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

  

                if ($copyResult -eq "SKIPPED") {

                    $skipped += $relativePath

                    Log "  ✓ Skipped locked file: $relativePath" "Yellow"

                    break  # Exit retry loop

                }

                elseif ($copyResult -eq "FAILED_LOCKED") {

                    if ($attempt -eq $maxRetries) {

                        $skipped += $relativePath

                        Log "  ⚠️  Could not copy locked non-log file: $relativePath" "Yellow"

                    }

                    Start-Sleep -Seconds 1

                    continue

                }

                elseif ($copyResult -eq "COPIED_NORMAL" -or $copyResult -eq "COPIED_WITH_SHARING" -or $copyResult -eq "COPIED_LONGPATH") {

                    if ($copyResult -eq "COPIED_LONGPATH") {

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

  

                        # Track successfully copied file

                        $successfullyCopiedFiles += $relativePath

  

                        # Track whether this was an add or update

                        if ($isUpdate) {

                            $script:updatedFiles += $relativePath

  

                            # Track guitar scores separately - FIXED: use script scope

                            if ($relativePath -like "*$($script:guitarScoresPath)*") {

                                $script:updatedGuitarFiles += $relativePath

                            }

                        } else {

                            $script:addedFiles += $relativePath

  

                            # Track guitar scores separately - FIXED: use script scope

                            if ($relativePath -like "*$($script:guitarScoresPath)*") {

                                $script:addedGuitarFiles += $relativePath

                            }

                        }

  

                        # Update hash cache

                        Update-HashCache -cache $script:hashCache -relativePath $relativePath -hash $sourceHash -size $file.Length -lastModified $file.LastWriteTime

  

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

                else {

                    Log "  Copy failed (attempt $attempt): $relativePath" "Yellow"

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

        Save-HashCache -cache $script:hashCache

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


    $destItems = @()

    $queue = New-Object System.Collections.Queue

    $queue.Enqueue($destination)

    

    while ($queue.Count -gt 0) {

        $currentPath = $queue.Dequeue()

        

        try {

            $items = @(Get-ChildItem -LiteralPath $currentPath -Force -ErrorAction Stop)

            

            foreach ($item in $items) {

                try {

                    if ($item.PSIsContainer) {

                        $queue.Enqueue($item.FullName)

                    }

                    $destItems += $item

                } catch {

                    continue

                }

            }

        } catch {

            continue

        }

    }

    

    $deletedCount = 0

    $ignoredCount = 0


    foreach ($item in $destItems) {

        if ($item.PSIsContainer) {

            continue

        }


        $relativePath = $item.FullName.Substring($destination.Length).TrimStart('\')

  

        if (Test-ShouldIgnore $relativePath) {

            $ignoredCount++

            continue

        }

  

        if (Test-ShouldExcludeFile $item.Name) {

            continue

        }


        $sourceFile = Join-Path $source $relativePath

        if (-not (Test-Path -LiteralPath $sourceFile)) {

            try {

                Remove-Item -LiteralPath $item.FullName -Force -ErrorAction Stop

                $deletedCount++

                Log "  Deleted extra file: $relativePath" "Gray"

            } catch {

                Log "  Failed to delete: $relativePath - $($_.Exception.Message)" "Yellow"

            }

        }

    }


    if ($deletedCount -gt 0) {

        Log "✓ Deleted $deletedCount extra file(s)" "Green"

    } else {

        Log "✓ No extra files to delete" "Green"

    }

  

    if ($ignoredCount -gt 0) {

        Log "  (Preserved $ignoredCount file(s) in ignored folders)" "Gray"

    }

} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $changes.ToDelete.Count -gt 0) {

    Log-Header "DELETING OBSOLETE FILES (INCREMENTAL)"

  

    $deletedCount = 0

    $deletedFiles = @()

  

    foreach ($relativePath in $changes.ToDelete) {

        $destFile = Join-Path $destination $relativePath

  

        if (Test-Path -LiteralPath $destFile) {

            try {

                Remove-Item -LiteralPath $destFile -Force -ErrorAction Stop

                $deletedCount++

                $deletedFiles += $relativePath

                $script:deletedFiles += $relativePath

                

                # Track guitar scores separately - FIXED: use script scope

                if ($relativePath -like "*$($script:guitarScoresPath)*") {

                    $script:deletedGuitarFiles += $relativePath

                }

                Log "  Deleted: $relativePath" "Gray"

            } catch {

                Log "  Failed to delete: $relativePath - $($_.Exception.Message)" "Yellow"

            }

        }

    }

  

    Log "✓ Deleted $deletedCount obsolete file(s)" "Green"

  

    # Save deleted files list

    if ($deletedFiles.Count -gt 0) {

        $deletedListFile = Join-Path $destination "deleted_files_$(Get-Date -Format 'yyyyMMdd_HHmmss').txt"

        try {

            $deletedFiles | Out-File -FilePath $deletedListFile -Force -Encoding UTF8

            Log "  Full list saved to: $deletedListFile" "Gray"

        } catch {

            Log "  Could not save deleted files list: $($_.Exception.Message)" "Yellow"

        }

    }

} else {

    $deletedCount = 0

}


# ===================== FINAL SUMMARY =====================

$stopwatch.Stop()


Log-Header "OPERATION SUMMARY"


# Show successfully copied files

if ($successfullyCopiedFiles.Count -gt 0) {

    Log "`nSuccessfully Copied Files:" "Green"

    Log "  Total copied: $($successfullyCopiedFiles.Count)" "Green"

  

    # Save full list to file

    $copiedListFile = Join-Path $destination "successfully_copied_$(Get-Date -Format 'yyyyMMdd_HHmmss').txt"

    try {

        $successfullyCopiedFiles | Out-File -FilePath $copiedListFile -Force -Encoding UTF8

        Log "  Full list saved to: $copiedListFile" "Gray"

    } catch {

        Log "  Could not save copied files list: $($_.Exception.Message)" "Yellow"

    }

}


# Copy summary

Log "`nCopy Statistics:" "Cyan"

Log "  Files processed: $($filesToProcess.Count)" "White"

Log "  Successfully copied: $copied" "Green"

Log "  Failed copies: $($failed.Count)" "Red"

Log "  Skipped (locked): $($skipped.Count)" "Yellow"


if ($longPathUsed -gt 0) {

    Log "  Long path workaround used: $longPathUsed files" "Yellow"

}


if ($largeFilesProcessed.Count -gt 0) {

    Log "`nLarge Files Processed ($($largeFilesProcessed.Count)):" "Yellow"

    foreach ($largeFile in $largeFilesProcessed) {

        Log "  $($largeFile.SizeMB) MB - $($largeFile.Path)" "Gray"

    }

}


if ($failed.Count -gt 0) {

    Log "`nFailed Files:" "Red"

    foreach ($failedFile in $failed) {

        Log "  $failedFile" "Red"

    }

}


if ($skipped.Count -gt 0) {

    Log "`nSkipped Files (locked):" "Yellow"

    foreach ($skippedFile in $skipped) {

        Log "  $skippedFile" "Yellow"

    }

}


# Delete summary

if ($deletedCount -gt 0) {

    Log "`nDeleted obsolete files: $deletedCount" "Cyan"

}


$elapsed = $stopwatch.Elapsed

Log "`nTotal Time: $($elapsed.ToString('hh\:mm\:ss'))" "Cyan"


# Hash cache statistics

if ($script:useHashCache) {

    Log "`nHash Cache Statistics:" "Gray"

    Log "  Cache hits: $($script:cacheHits)" "Green"

    Log "  Cache misses: $($script:cacheMisses)" "Yellow"

    $hitRate = if (($script:cacheHits + $script:cacheMisses) -gt 0) { 

        [math]::Round(($script:cacheHits / ($script:cacheHits + $script:cacheMisses)) * 100, 1) 

    } else { 0 }

    Log "  Hit rate: $hitRate%" "Cyan"

}


# ===================== FINAL HASH VERIFICATION =====================

if ($runFinalHashCheck) {

    Log-Header "FINAL HASH VERIFICATION"

    Log "This may take several minutes for large directories..." "Yellow"

    

    $sourceHashes = @{}

    $destHashes = @{}

    

    $mismatchCount = 0

    $missingCount = 0

    $verifiedCount = 0

    

    # Get source file hashes

    Log "`nCalculating source hashes..." "Cyan"

    $sourceFiles = @(Get-FilesRecursive -Path $source -Description "source" | Where-Object {
        $relativePath = $_.FullName.Substring($source.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    })

    

    $sourceProcessed = 0

    foreach ($file in $sourceFiles) {

        $sourceProcessed++

        if ($sourceProcessed % 100 -eq 0) {

            Write-Host "`r  Processing source file $sourceProcessed/$($sourceFiles.Count)..." -NoNewline -ForegroundColor Gray

        }

        

        $relativePath = $file.FullName.Substring($source.Length).TrimStart('\')

        

        try {

            $hash = (Get-FileHash -LiteralPath $file.FullName -Algorithm SHA256 -ErrorAction Stop).Hash

            $sourceHashes[$relativePath] = $hash

        } catch {

            Log "  Could not hash source file: $relativePath" "Red"

        }

    }

    Write-Host "`r  ✓ Source hashes calculated: $($sourceHashes.Count) files          " -ForegroundColor Green

    

    # Get destination file hashes

    Log "`nCalculating destination hashes..." "Cyan"

    $destFiles = @(Get-FilesRecursive -Path $destination -Description "destination" | Where-Object {
        $relativePath = $_.FullName.Substring($destination.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    })

    

    $destProcessed = 0

    foreach ($file in $destFiles) {

        $destProcessed++

        if ($destProcessed % 100 -eq 0) {

            Write-Host "`r  Processing destination file $destProcessed/$($destFiles.Count)..." -NoNewline -ForegroundColor Gray

        }

        

        $relativePath = $file.FullName.Substring($destination.Length).TrimStart('\')

        

        try {

            $hash = (Get-FileHash -LiteralPath $file.FullName -Algorithm SHA256 -ErrorAction Stop).Hash

            $destHashes[$relativePath] = $hash

        } catch {

            Log "  Could not hash destination file: $relativePath" "Red"

        }

    }

    Write-Host "`r  ✓ Destination hashes calculated: $($destHashes.Count) files       " -ForegroundColor Green

    

    # Compare hashes

    Log "`nComparing hashes..." "Cyan"

    foreach ($relativePath in $sourceHashes.Keys) {

        if ($destHashes.ContainsKey($relativePath)) {

            if ($sourceHashes[$relativePath] -eq $destHashes[$relativePath]) {

                $verifiedCount++

            } else {

                $mismatchCount++

                Log "  HASH MISMATCH: $relativePath" "Red"

            }

        } else {

            $missingCount++

            Log "  MISSING IN DESTINATION: $relativePath" "Red"

        }

    }

    

    Log "`nVerification Results:" "Cyan"

    Log "  Verified matches: $verifiedCount" "Green"

    Log "  Hash mismatches: $mismatchCount" "Red"

    Log "  Missing in destination: $missingCount" "Red"

    

    if ($mismatchCount -eq 0 -and $missingCount -eq 0) {

        Log "✓ VERIFICATION PASSED - All files match!" "Green"

    } else {

        Log "⚠️  VERIFICATION FAILED - Some files do not match!" "Red"

    }

} else {

    Log-Header "FINAL VERIFICATION SKIPPED"

    Log "Hash verification was skipped for faster completion" "Yellow"

}


# ===================== FINAL TRACKING SUMMARY =====================

$addedFilesReport = Join-Path $reportsFolder "AddedFiles_$reportDate.txt"

$updatedFilesReport = Join-Path $reportsFolder "UpdatedFiles_$reportDate.txt"

$deletedFilesReport = Join-Path $reportsFolder "DeletedFiles_$reportDate.txt"

$differenceReport = Join-Path $reportsFolder "DifferenceAnalysis_$reportDate.txt"


Log-Header "CHANGE TRACKING SUMMARY"


if ($script:addedFiles.Count -gt 0) {

    if ($script:addedFiles.Count -le 50) {

        Log "`nFiles Added to Destination ($($script:addedFiles.Count)):" "Green"

        $script:addedFiles | ForEach-Object { Log "  + $_" "Green" }

    } else {

        Log "`nFiles Added to Destination: $($script:addedFiles.Count) files (saved to report)" "Green"

        $script:addedFiles | Out-File $addedFilesReport -Encoding UTF8

        Log "  Report saved: $addedFilesReport" "Cyan"

    }

} else {

    Log "`nFiles Added to Destination: 0" "Gray"

}


if ($script:updatedFiles.Count -gt 0) {

    if ($script:updatedFiles.Count -le 50) {

        Log "`nFiles Updated in Destination ($($script:updatedFiles.Count)):" "Yellow"

        $script:updatedFiles | ForEach-Object { Log "  ≈ $_" "Yellow" }

    } else {

        Log "`nFiles Updated in Destination: $($script:updatedFiles.Count) files (saved to report)" "Yellow"

        $script:updatedFiles | Out-File $updatedFilesReport -Encoding UTF8

        Log "  Report saved: $updatedFilesReport" "Cyan"

    }

} else {

    Log "`nFiles Updated in Destination: 0" "Gray"

}


if ($script:deletedFiles.Count -gt 0) {

    if ($script:deletedFiles.Count -le 50) {

        Log "`nFiles Deleted from Destination ($($script:deletedFiles.Count)):" "Red"

        $script:deletedFiles | ForEach-Object { Log "  - $_" "Red" }

    } else {

        Log "`nFiles Deleted from Destination: $($script:deletedFiles.Count) files (saved to report)" "Red"

        $script:deletedFiles | Out-File $deletedFilesReport -Encoding UTF8

        Log "  Report saved: $deletedFilesReport" "Cyan"

    }

} else {

    Log "`nFiles Deleted from Destination: 0" "Gray"

}

# ===================== GUITAR SCORES DETAILED REPORT =====================
Log-Header "GUITAR SCORES TRACKING"

$guitarReportFile = Join-Path $reportsFolder "GuitarScoresReport_$reportDate.txt"

# Count PDF and other file types
$addedPdfs = ($script:addedGuitarFiles | Where-Object { $_ -like "*.pdf" }).Count
$addedZips = ($script:addedGuitarFiles | Where-Object { $_ -like "*.zip" }).Count
$updatedPdfs = ($script:updatedGuitarFiles | Where-Object { $_ -like "*.pdf" }).Count
$updatedZips = ($script:updatedGuitarFiles | Where-Object { $_ -like "*.zip" }).Count
$deletedPdfs = ($script:deletedGuitarFiles | Where-Object { $_ -like "*.pdf" }).Count
$deletedZips = ($script:deletedGuitarFiles | Where-Object { $_ -like "*.zip" }).Count

$totalGuitarAdded = $script:addedGuitarFiles.Count
$totalGuitarUpdated = $script:updatedGuitarFiles.Count
$totalGuitarDeleted = $script:deletedGuitarFiles.Count
$totalGuitarChanged = $totalGuitarAdded + $totalGuitarUpdated + $totalGuitarDeleted

if ($totalGuitarChanged -gt 0) {
    Log "`nGuitar Scores Summary:" "Cyan"
    Log "  PDFs Added: $addedPdfs" $(if($addedPdfs -gt 0){"Green"}else{"Gray"})
    Log "  PDFs Updated: $updatedPdfs" $(if($updatedPdfs -gt 0){"Yellow"}else{"Gray"})
    Log "  PDFs Deleted: $deletedPdfs" $(if($deletedPdfs -gt 0){"Red"}else{"Gray"})
    Log "  ZIPs Added: $addedZips" $(if($addedZips -gt 0){"Green"}else{"Gray"})
    Log "  ZIPs Updated: $updatedZips" $(if($updatedZips -gt 0){"Yellow"}else{"Gray"})
    Log "  ZIPs Deleted: $deletedZips" $(if($deletedZips -gt 0){"Red"}else{"Gray"})
    Log "  Total Guitar Files Changed: $totalGuitarChanged" "Cyan"

    # Create detailed guitar scores report
    $guitarReportContent = @"
================================================================================
GUITAR SCORES MIRROR REPORT
================================================================================
Generated: $(Get-Date -Format "yyyy-MM-dd HH:mm:ss")
Source: $source\$($script:guitarScoresPath)
Destination: $destination\$($script:guitarScoresPath)

SUMMARY:
--------
Total Guitar Files Changed:  $totalGuitarChanged

PDF Scores Added:     $addedPdfs
PDF Scores Updated:   $updatedPdfs
PDF Scores Deleted:   $deletedPdfs

ZIP Archives Added:   $addedZips
ZIP Archives Updated: $updatedZips
ZIP Archives Deleted: $deletedZips

================================================================================
ADDED GUITAR FILES ($($script:addedGuitarFiles.Count)):
================================================================================
$($script:addedGuitarFiles -join "`n")

================================================================================
UPDATED GUITAR FILES ($($script:updatedGuitarFiles.Count)):
================================================================================
$($script:updatedGuitarFiles -join "`n")

================================================================================
DELETED GUITAR FILES ($($script:deletedGuitarFiles.Count)):
================================================================================
$($script:deletedGuitarFiles -join "`n")

================================================================================
END OF REPORT
================================================================================
"@

    $guitarReportContent | Out-File $guitarReportFile -Encoding UTF8
    Log "`nGuitar Scores Report saved: $guitarReportFile" "Cyan"
    
    # Show breakdown by file type
    if ($totalGuitarAdded + $totalGuitarUpdated -gt 0) {
        Log "`nGuitar Files by Type:" "Cyan"
        $pdfTotal = $addedPdfs + $updatedPdfs
        $zipTotal = $addedZips + $updatedZips
        Log "  PDF files: $pdfTotal" "White"
        Log "  ZIP files: $zipTotal" "White"
    }
} else {
    Log "`nGuitar Scores: No changes detected" "Gray"
}


# ===================== DIFFERENCE ANALYSIS =====================
Log-Header "DIFFERENCE ANALYSIS"
Log "Analyzing current state of source vs destination..."

try {
    # Scan SOURCE with progress
    Log "`n📁 Scanning SOURCE directory..." "Cyan"
    $sourceCount = 0
    $currentSourceFiles = @()
    
    $sourceFiles = Get-FilesRecursive -Path $source -Description "source"
    
    foreach ($file in $sourceFiles) {
        $relativePath = $file.FullName.Substring($source.Length).TrimStart('\')
        
        if (-not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $file.Name)) {
            $currentSourceFiles += $relativePath
            $sourceCount++
            
            # Show progress every 1000 files
            if ($sourceCount % 1000 -eq 0) {
                Write-Host "`r   Processing: $sourceCount files..." -NoNewline -ForegroundColor Yellow
            }
        }
    }
    Write-Host "`r   ✓ Source scan complete: $sourceCount files" -ForegroundColor Green
    
    # Scan DESTINATION with progress
    Log "`n📁 Scanning DESTINATION directory..." "Cyan"
    $destCount = 0
    $currentDestFiles = @()
    
    $destFiles = Get-FilesRecursive -Path $destination -Description "destination"
    
    foreach ($file in $destFiles) {
        $relativePath = $file.FullName.Substring($destination.Length).TrimStart('\')
        
        if (-not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $file.Name)) {
            $currentDestFiles += $relativePath
            $destCount++
            
            # Show progress every 1000 files
            if ($destCount % 1000 -eq 0) {
                Write-Host "`r   Processing: $destCount files..." -NoNewline -ForegroundColor Yellow
            }
        }
    }
    Write-Host "`r   ✓ Destination scan complete: $destCount files" -ForegroundColor Green

    # Compare files with progress
    Log "`n🔍 Comparing files..." "Cyan"
    Log "   This may take a few moments for large file sets..."
    
    $missingInDest = @($currentSourceFiles | Where-Object { $_ -notin $currentDestFiles })
    $extraInDest = @($currentDestFiles | Where-Object { $_ -notin $currentSourceFiles })
    
    Log "   ✓ Comparison complete!" "Green"

    $diffReportContent = @"
================================================================================
DIFFERENCE ANALYSIS REPORT
================================================================================
Generated: $(Get-Date -Format "yyyy-MM-dd HH:mm:ss")
Source: $source
Destination: $destination

SUMMARY:
--------
Total files in Source:      $($currentSourceFiles.Count)
Total files in Destination: $($currentDestFiles.Count)
Missing in Destination:     $($missingInDest.Count)
Extra in Destination:       $($extraInDest.Count)

================================================================================
MISSING IN DESTINATION ($($missingInDest.Count) files):
================================================================================
These files exist in source but are NOT in destination.

$($missingInDest -join "`n")

================================================================================
EXTRA IN DESTINATION ($($extraInDest.Count) files):
================================================================================
These files exist in destination but NOT in source.

$($extraInDest -join "`n")

================================================================================
END OF REPORT
================================================================================
"@

    $diffReportContent | Out-File $differenceReport -Encoding UTF8
    Log "  Difference report saved: $differenceReport" "Cyan"
    
    if ($missingInDest.Count -eq 0 -and $extraInDest.Count -eq 0) {
        Log "  No differences detected" "Green"
    }
}
catch {
    Log "  Error during difference analysis: $($_.Exception.Message)" "Red"
}

# ===================== SUMMARY OF REPORTS =====================
Log-Header "REPORTS GENERATED"
Log "All reports saved to: $reportsFolder" "Cyan"
Log ""

$reportFiles = Get-ChildItem $reportsFolder -File
if ($reportFiles.Count -gt 0) {
    foreach ($report in $reportFiles) {
        Log "  📄 $($report.Name)" "White"
    }
} else {
    Log "  No additional reports generated (no changes detected)" "Gray"
}

Write-Host "`nPress ENTER to exit..."
Read-Host
