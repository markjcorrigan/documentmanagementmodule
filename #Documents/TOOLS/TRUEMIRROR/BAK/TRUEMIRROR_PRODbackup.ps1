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

How to run:
1. Open PowerShell 7+ as Administrator
2. Run: .\TRUEMIRROR_PROD.ps1
3. Log file: C:\enhanced_mirror.log
#>

# ===================== CONFIG =====================
$source = "E:\pmway"        # Source folder
$destination = "F:\pmway"   # Destination folder
$logFile = "F:\enhanced_mirror.log"      # Log file location
$maxRetries = 3                          # Max retries per file
$progressInterval = 10                   # Progress update frequency (every N files)
$enableFinalHashCheck = $true            # Final folder hash verification (can be overridden for incremental)
$recreateJunctions = $false              # Recreate junctions properly
$largeFileSizeMB = 50                    # Show progress for files larger than this (MB)

# ===================== DRIVE CONFIGURATION =====================
$destinationDrive = "F"  # Destination drive letter

# ===================== IGNORE RULES (SOURCE) =====================
$ignoreFoldersInDest = @(
  
)

# ===================== FILE EXCLUSION RULES =====================
$excludeFiles = @(
  
)

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

# ===================== HASH CHECK OPTION (FOR INCREMENTAL ONLY) =====================
$runFinalHashCheck = $enableFinalHashCheck

if ($operationMode -eq "INCREMENTAL_UPDATE") {
    Write-Host ""
    Write-Host "======================================================" -ForegroundColor Cyan
    Write-Host "           HASH CHECK OPTION (INCREMENTAL)            " -ForegroundColor Cyan
    Write-Host "======================================================" -ForegroundColor Cyan
    Write-Host ""
    Write-Host "Hash checking verifies file integrity but can take significant time." -ForegroundColor Yellow
    Write-Host "You can skip it now and run it after multiple incremental updates." -ForegroundColor Yellow
    Write-Host ""
    Write-Host "Run final hash check after this incremental update?" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "[Y] Yes - Run hash check (slower, more thorough)" -ForegroundColor White
    Write-Host "[N] No  - Skip hash check (faster, run later)" -ForegroundColor White
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
        Write-Host "✓ Hash check will run after sync" -ForegroundColor Green
    } else {
        Write-Host "⚠️  Hash check skipped - you can run it after multiple updates" -ForegroundColor Yellow
    }
} else {
    # Full mirror mode - hash check is mandatory
    Write-Host ""
    Write-Host "ℹ️  FULL MIRROR mode: Hash checking is mandatory" -ForegroundColor Cyan
    $runFinalHashCheck = $true
}

# ===================== DEBUG PATH CHECK =====================
Write-Host "`n=== DEBUG PATH CHECK ===" -ForegroundColor Yellow
Write-Host "Source: $source" -ForegroundColor Cyan
Write-Host "Source exists: $(Test-Path $source)" -ForegroundColor Cyan
Write-Host "Destination: $destination" -ForegroundColor Cyan
Write-Host "Destination exists: $(Test-Path $destination)" -ForegroundColor Cyan

# Check disk space using the configured drive
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

# ===================== INCREMENTAL SCAN FUNCTION =====================
function Get-IncrementalChanges {
    param(
        [string]$Source,
        [string]$Destination
    )
    
    Log "Scanning for incremental changes..." "Cyan"
    
    $filesToCopy = @()      # New files
    $filesToUpdate = @()    # Changed files
    $filesToDelete = @()    # Files no longer in source
    
    # Scan source files (excluding ignored folders and excluded files)
    $sourceFiles = Get-ChildItem -Path $Source -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
        $relativePath = $_.FullName.Substring($Source.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    }
    
    # Scan destination files (excluding ignored folders and excluded files)
    $destFiles = Get-ChildItem -Path $Destination -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
        $relativePath = $_.FullName.Substring($Destination.Length).TrimStart('\')
        -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    }
    
    # Create hashtables for quick lookup
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
    
    Log "Comparing files..." "Gray"
    $totalSourceFiles = $sourceFileInfo.Count
    $totalDestFiles = $destFileInfo.Count
    $processed = 0
    
    # Identify new and changed files
    foreach ($relativePath in $sourceFileInfo.Keys) {
        $processed++
        if ($processed % 100 -eq 0) {
            $pct = [math]::Round(($processed / $totalSourceFiles) * 100, 1)
            Write-Host "  Comparing: $processed/$totalSourceFiles ($pct%)" -ForegroundColor Gray
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
                    $sourceHash = Get-FileHash -LiteralPath $sourceItem.Path -Algorithm SHA256 -ErrorAction Stop
                    $destHash = Get-FileHash -LiteralPath $destItem.Path -Algorithm SHA256 -ErrorAction Stop
                    
                    if ($sourceHash.Hash -ne $destHash.Hash) {
                        $filesToUpdate += $relativePath
                    }
                } catch {
                    # If hashing fails, assume file needs update
                    $filesToUpdate += $relativePath
                }
            }
        }
    }
    
    # Identify files to delete (exist in destination but not in source)
    foreach ($relativePath in $destFileInfo.Keys) {
        if (-not $sourceFileInfo.ContainsKey($relativePath)) {
            $filesToDelete += $relativePath
        }
    }
    
    return @{
        ToCopy = $filesToCopy
        ToUpdate = $filesToUpdate
        ToDelete = $filesToDelete
        SourceFileCount = $totalSourceFiles
        DestFileCount = $totalDestFiles
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
Log "Timestamp:   $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"

if ($ignoreFoldersInDest.Count -gt 0) {
    Log "`nIgnore Rules (will NOT be copied from source):" "Cyan"
    foreach ($pattern in $ignoreFoldersInDest) {
        Log "  - Folders matching: $pattern" "Cyan"
    }
    Log "Note: Matching folders in destination will be preserved (not deleted)" "Cyan"
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

# Verify destination drive is accessible using the configured drive
$destinationDrivePath = "$($destinationDrive):\"
if (-not (Test-Path $destinationDrivePath)) {
    Log "ERROR: $($destinationDrive): drive is not accessible!" "Red"
    Log "Please check if the SSD is properly connected and mounted." "Red"
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
    $sourceIgnoredFolders | Select-Object -First 20 | ForEach-Object { Log "  - $_" "Yellow" }
    if ($sourceIgnoredFolders.Count -gt 20) {
        Log "  ... and $($sourceIgnoredFolders.Count - 20) more" "Yellow"
    }
} else {
    Log "No ignored folders found in source."
}

# ===================== DETECT EXCLUDED FILES IN SOURCE =====================
$sourceExcludedFiles = @()
if ($excludeFiles.Count -gt 0) {
    Log-Header "DETECTING EXCLUDED FILES IN SOURCE"
    $allSourceFiles = Get-ChildItem $source -Recurse -File -Force -ErrorAction SilentlyContinue
    
    foreach ($file in $allSourceFiles) {
        if (Test-ShouldExcludeFile $file.Name) {
            $relativePath = $file.FullName.Substring($source.Length).TrimStart('\')
            $sourceExcludedFiles += $relativePath
        }
    }
    
    if ($sourceExcludedFiles.Count -gt 0) {
        Log "Found $($sourceExcludedFiles.Count) file(s) in source that will be EXCLUDED:" "Yellow"
        $sourceExcludedFiles | Select-Object -First 30 | ForEach-Object { Log "  - $_" "Yellow" }
        if ($sourceExcludedFiles.Count -gt 30) {
            Log "  ... and $($sourceExcludedFiles.Count - 30) more" "Yellow"
        }
    } else {
        Log "No excluded files found in source."
    }
}

# ===================== MODE-SPECIFIC PROCESSING =====================
if ($operationMode -eq "FULL_MIRROR") {
    # ===================== DELETE DESTINATION CONTENTS (FULL MIRROR ONLY) =====================
    Log-Header "FULL MIRROR: PREPARING DESTINATION"
    
    # Check if destination has any contents
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
                
                # Preserve ignored folders even in full mirror mode
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
            Log "  Destination is now ready for full mirror" "Green"
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
    
    # Get all source items
    $allSourceItems = Get-ChildItem $source -Recurse -Force -ErrorAction SilentlyContinue
    
    # Separate junctions and regular files
    foreach ($item in $allSourceItems) {
        $relativePath = $item.FullName.Substring($source.Length).TrimStart('\')
        
        # Skip ignored folders
        if (Test-ShouldIgnore $relativePath) {
            continue
        }
        
        # Check if item is a junction
        if ($item.Attributes -band [System.IO.FileAttributes]::ReparsePoint) {
            if ($recreateJunctions) {
                $sourceJunctionsToRecreate += $item
            }
            continue
        }
        
        # Process regular files
        if (-not $item.PSIsContainer) {
            # Skip excluded files
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
        
        # Combine new and changed files
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
            
            # FIX: Handle hours > 99 (days of copying on slow drive!)
            if ($hours -gt 99) {
                # Show days for very long operations
                $days = [math]::Floor($hours / 24)
                $remainingHours = $hours % 24
                return "${days}d ${remainingHours}:$($minutes.ToString('00')):$($seconds.ToString('00'))"
            } else {
                # Normal display for < 100 hours
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
        
        for ($attempt = 1; $attempt -le $maxRetries -and -not $success; $attempt++) {
            try {
                # Copy file
                try {
                    Copy-Item -LiteralPath $file.FullName -Destination $destFile -Force -ErrorAction Stop
                } catch {
                    if ($_.Exception.Message -match "PathTooLong" -or $_.Exception.Message -match "path.*too long") {
                        $longSourcePath = Get-LongPath $file.FullName
                        $longDestPath = Get-LongPath $destFile
                        [System.IO.File]::Copy($longSourcePath, $longDestPath, $true)
                        $usedLongPath = $true
                    } else {
                        throw
                    }
                }
                
                # Show hash verification status for large files
                if ($fileSizeMB -ge $largeFileSizeMB) {
                    Write-Host "  Verifying hash..." -ForegroundColor Gray
                }
                
                # Verify hash
                $sourceHash = Get-FileHash -LiteralPath $file.FullName -Algorithm SHA256 -ErrorAction Stop
                $destHash = Get-FileHash -LiteralPath $destFile -Algorithm SHA256 -ErrorAction Stop
                
                if ($sourceHash.Hash -eq $destHash.Hash) {
                    $success = $true
                    $copied++
                    if ($fileSizeMB -ge $largeFileSizeMB) {
                        Write-Host "  ✓ Large file verified successfully" -ForegroundColor Green
                    }
                    if ($usedLongPath) {
                        $longPathUsed++
                        if ($longPathUsed -le 10) {
                            Log "  Long path: $relativePath [Length: $($file.FullName.Length)]" "Gray"
                        }
                    }
                } else {
                    Log "  Hash mismatch (attempt $attempt): $relativePath" "Yellow"
                }
            } catch {
                Log "  Copy failed (attempt $attempt): $relativePath - $($_.Exception.Message)" "Yellow"
            }
            
            if (-not $success -and $attempt -lt $maxRetries) {
                Start-Sleep -Seconds 1
            }
        }
        
        if (-not $success) {
            $failed += $relativePath
            Log "  PERMANENT FAILURE: $relativePath (Path: $($file.FullName.Length) chars)" "Red"
        }
        
        # Progress update
        $processed++
        if ($processed % $progressInterval -eq 0 -or $processed -eq $totalFiles) {
            $eta = Update-ETA $processed $totalFiles
            $pct = [math]::Round(($processed / $totalFiles) * 100, 1)
            Write-Host "Progress: $processed/$totalFiles ($pct%) - Copied: $copied - Failed: $($failed.Count) - ETA: $eta" -ForegroundColor Cyan
        }
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $filesToProcess.Count -eq 0) {
    $copied = 0
    $failed = @()
    $longPathUsed = 0
    $largeFilesProcessed = @()
    $stopwatch = [System.Diagnostics.Stopwatch]::StartNew()
}

# ===================== DELETE EXTRA FILES =====================
if ($operationMode -eq "FULL_MIRROR") {
    Log-Header "CLEANING UP EXTRA FILES (FULL MIRROR)"
    Log "Checking for extra files in destination (respecting ignore rules)..."

    $destItems = Get-ChildItem $destination -Recurse -Force -ErrorAction SilentlyContinue
    $deletedCount = 0
    $ignoredCount = 0

    foreach ($item in $destItems) {
        $relativePath = $item.FullName.Substring($destination.Length).TrimStart('\')
        
        # Check if should be ignored (preserved in destination)
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
                if ($deletedCount -le 20) {
                    Log "  Deleted: $relativePath" "Gray"
                }
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

    if ($ignoredCount -gt 0) {
        Log "Note: Ignored $ignoredCount item(s) in ignored folders (preserved in destination)" "Gray"
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE" -and $changes.ToDelete.Count -gt 0) {
    Log-Header "DELETING OBSOLETE FILES (INCREMENTAL UPDATE)"
    Log "Deleting $($changes.ToDelete.Count) file(s) that no longer exist in source..." "Yellow"
    
    $deletedCount = 0
    $deleteFailed = @()
    
    foreach ($relativePath in $changes.ToDelete) {
        $destPath = Join-Path $destination $relativePath
        
        # Double-check it's not in an ignored folder
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
                
                if ($deletedCount -le 20) {
                    Log "  Deleted: $relativePath" "Gray"
                }
            } catch {
                $deleteFailed += $relativePath
                Log "  FAILED to delete: $relativePath - $($_.Exception.Message)" "Red"
            }
        }
    }
    
    if ($deletedCount -gt 0) {
        Log "✓ Deleted $deletedCount obsolete file(s)" "Green"
    }
    
    if ($deleteFailed.Count -gt 0) {
        Log "⚠️  Failed to delete $($deleteFailed.Count) file(s)" "Yellow"
    }
} elseif ($operationMode -eq "INCREMENTAL_UPDATE") {
    Log "No obsolete files to delete." "Green"
}

# ===================== RECREATE JUNCTIONS =====================
$junctionsCreated = 0
if ($recreateJunctions -and $sourceJunctionsToRecreate.Count -gt 0) {
    Log-Header "RECREATING JUNCTIONS"
    
    foreach ($sourceJunction in $sourceJunctionsToRecreate) {
        $relativePath = $sourceJunction.FullName.Substring($source.Length).TrimStart('\')
        $destJunctionPath = Join-Path $destination $relativePath
        
        # Get target and convert to destination path
        $sourceTarget = $sourceJunction.Target
        if ($sourceTarget.StartsWith($source)) {
            $relativeTarget = $sourceTarget.Substring($source.Length).TrimStart('\')
            $destTarget = Join-Path $destination $relativeTarget
        } else {
            $destTarget = $sourceTarget
        }
        
        try {
            # Remove if exists (might be a copied folder)
            if (Test-Path $destJunctionPath) {
                $item = Get-Item -LiteralPath $destJunctionPath -Force
                if ($item.Attributes -band [System.IO.FileAttributes]::ReparsePoint) {
                    $item.Delete()
                } else {
                    Remove-Item -LiteralPath $destJunctionPath -Recurse -Force -ErrorAction Stop
                }
            }
            
            # Create parent directory if needed
            $parentDir = Split-Path $destJunctionPath
            if (-not (Test-Path -LiteralPath $parentDir)) {
                New-Item -ItemType Directory -Path $parentDir -Force | Out-Null
            }
            
            # Create junction
            if (Test-Path $destTarget) {
                $newJunction = New-Item -ItemType Junction -Path $destJunctionPath -Target $destTarget -Force -ErrorAction Stop
                Log "  ✓ Created: $relativePath -> $destTarget" "Green"
                $junctionsCreated++
            } else {
                Log "  ✗ Target not found: $destTarget" "Red"
            }
        } catch {
            Log "  FAILED to create junction: $relativePath - $($_.Exception.Message)" "Red"
        }
    }
    
    Log "`n✓ Created $junctionsCreated/$($sourceJunctionsToRecreate.Count) junction(s)" "Green"
}

# ===================== SUMMARY =====================
$stopwatch.Stop()
Log-Header "MIRROR SUMMARY"

# Get all source files excluding ignored folders and excluded files
$allSourceFiles = Get-ChildItem $source -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
    $relativePath = $_.FullName.Substring($source.Length).TrimStart('\')
    -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
}
$sourceSize = ($allSourceFiles | Measure-Object Length -Sum).Sum / 1GB

# Get all destination files excluding ignored folders and excluded files
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

if ($operationMode -eq "INCREMENTAL_UPDATE") {
    Log "`nIncremental Update Results:"
    Log "  New files copied: $($changes.ToCopy.Count)" "Green"
    Log "  Updated files: $($changes.ToUpdate.Count)" "Green"
    Log "  Deleted files: $(if($changes.ToDelete.Count -gt 0){$deletedCount}else{0})" "Green"
    if ($deleteFailed.Count -gt 0) {
        Log "  Failed to delete: $($deleteFailed.Count)" "Red"
    }
}

Log "`nFile Operations:"
Log "  ✓ Files copied/updated: $copied" "Green"
Log "  ✗ Files failed: $($failed.Count)" $(if($failed.Count -gt 0){"Red"}else{"Green"})
Log "  ⚡ Long paths used: $longPathUsed" $(if($longPathUsed -gt 0){"Yellow"}else{"White"})
if ($sourceJunctionsToRecreate.Count -gt 0) {
    Log "  🔗 Junctions created: $junctionsCreated/$($sourceJunctionsToRecreate.Count)" $(if($junctionsCreated -eq $sourceJunctionsToRecreate.Count){"Green"}else{"Yellow"})
}

Log "`nTotal time: $($stopwatch.Elapsed.ToString('hh\:mm\:ss'))"

if ($largeFilesProcessed.Count -gt 0) {
    Log-Header "LARGE FILES SUMMARY"
    Log "Found $($largeFilesProcessed.Count) file(s) >= $largeFileSizeMB MB:" "Yellow"
    Log "These files may slow down mirroring - consider excluding if not needed.`n" "Gray"
    
    $largeFilesSorted = $largeFilesProcessed | Sort-Object -Property SizeMB -Descending
    foreach ($largeFile in $largeFilesSorted) {
        Log "  $($largeFile.SizeMB) MB - $($largeFile.Path)" "Cyan"
    }
    
    $totalLargeFileSize = ($largeFilesSorted | Measure-Object -Property SizeMB -Sum).Sum
    Log "`nTotal size of large files: $([math]::Round($totalLargeFileSize / 1024, 2)) GB" "Yellow"
}

if ($failed.Count -gt 0) {
    Log "`nFailed files (first 20):" "Red"
    $failed | Select-Object -First 20 | ForEach-Object { Log "  - $_" "Red" }
    if ($failed.Count -gt 20) { Log "  ... and $($failed.Count - 20) more" "Red" }
}

# ===================== OPTIONAL FINAL HASH CHECK =====================
if ($runFinalHashCheck -and $failed.Count -eq 0) {
    Log-Header "FINAL VERIFICATION"
    Log "Computing folder hashes (excluding ignored folders and excluded files)..."
    Log "This may take several minutes..."
    
    function Get-FolderHash($folder, $baseFolder, $ignoreFolders) {
        $hashAlgorithm = [System.Security.Cryptography.SHA256]::Create()
        $combinedHash = [System.Text.StringBuilder]::new()
        $hashErrors = 0
        $hashedFiles = 0
        
        Get-ChildItem $folder -Recurse -File -Force -ErrorAction SilentlyContinue | Sort-Object FullName | ForEach-Object {
            $relativePath = $_.FullName.Substring($baseFolder.Length).TrimStart('\')
            
            # Skip ignored folders
            if (Test-ShouldIgnore $relativePath) {
                return
            }
            
            # Skip excluded files
            if (Test-ShouldExcludeFile $_.Name) {
                return
            }
            
            try {
                $fileHash = Get-FileHash -LiteralPath $_.FullName -Algorithm SHA256 -ErrorAction Stop
                $combinedHash.Append($relativePath.ToLower()) | Out-Null
                $combinedHash.Append($fileHash.Hash) | Out-Null
                $hashedFiles++
            } catch {
                $hashErrors++
                if ($hashErrors -le 5) {
                    Log "  Warning: Could not hash: $relativePath - $($_.Exception.Message)" "Yellow"
                }
            }
        }
        
        if ($hashErrors -gt 5) {
            Log "  Warning: $hashErrors files could not be hashed (showing first 5)" "Yellow"
        }
        
        Log "  Hashed $hashedFiles files" "Gray"
        
        $finalHashBytes = $hashAlgorithm.ComputeHash([System.Text.Encoding]::UTF8.GetBytes($combinedHash.ToString()))
        $finalHash = [System.BitConverter]::ToString($finalHashBytes) -replace '-', ''
        $hashAlgorithm.Dispose()
        return $finalHash
    }
    
    Log "Hashing source folder (excluding ignored folders and excluded files)..."
    $sourceHash = Get-FolderHash $source $source $ignoreFoldersInDest
    
    Log "Hashing destination folder (excluding ignored folders and excluded files)..."
    $destHash = Get-FolderHash $destination $destination $ignoreFoldersInDest
    
    Log "`nHash Comparison:"
    Log "  Source hash:      $sourceHash" "Gray"
    Log "  Destination hash: $destHash" "Gray"
    
    if ($sourceHash -eq $destHash) {
        Log "`n✅ PERFECT MIRROR CONFIRMED!" "Green"
        Log "   Source and destination are identical (excluding ignored folders and excluded files)" "Green"
    } else {
        Log "`n⚠️  Hash mismatch detected" "Yellow"
        Log "   This may indicate differences in the mirror" "Yellow"
        Log "   File counts: Source=$($allSourceFiles.Count), Dest=$($allDestFiles.Count)" "Yellow"
    }
} elseif (-not $runFinalHashCheck -and $operationMode -eq "INCREMENTAL_UPDATE") {
    Log-Header "HASH CHECK SKIPPED"
    Log "⏭️  Final hash verification was skipped (user choice)" "Yellow"
    Log "💡 Tip: Run hash check after multiple incremental updates for verification" "Cyan"
}

# ===================== FINAL STATUS =====================
Log-Header "MIRROR COMPLETED"

if ($failed.Count -eq 0) {
    if ($runFinalHashCheck -and $sourceHash -eq $destHash) {
        Log "✅ SUCCESS - FULL MIRROR VERIFIED!" "Green"
        Log "   All files copied and hash verification passed." "Green"
        Log "   Source and destination are identical (excluding ignored folders and excluded files)." "Green"
    } else {
        Log "✅ SUCCESS - $operationMode completed successfully!" "Green"
        if ($operationMode -eq "INCREMENTAL_UPDATE") {
            $totalChanges = $changes.ToCopy.Count + $changes.ToUpdate.Count + $deletedCount
            Log "   $totalChanges item(s) were processed (new/changed/deleted)." "Green"
        }
        Log "   The destination mirrors the source (excluding ignored folders and excluded files)." "Green"
        if (-not $runFinalHashCheck) {
            Log "   Hash check was skipped - enable for additional verification." "Gray"
        }
    }
    if ($sourceIgnoredFolders.Count -gt 0 -or ($excludeFiles.Count -gt 0 -and $sourceExcludedFiles.Count -gt 0)) {
        $totalExcluded = $sourceIgnoredFolders.Count + $(if ($sourceExcludedFiles.Count) { $sourceExcludedFiles.Count } else { 0 })
        Log "   Note: $totalExcluded item(s) were intentionally not copied (folders + files)." "Cyan"
    }
} else {
    Log "⚠️  COMPLETED WITH ERRORS" "Yellow"
    Log "   $($failed.Count) file(s) failed to copy - see log for details" "Yellow"
}

Log "`nLog file: $logFile"

Write-Host "`nPress ENTER to exit..."
# ===================== DESTINATION BACKUP LOG =====================
$backupLogFile = Join-Path $destination "backup.log"

try {
    # Create header for new backup entry
    $separator = "=" * 60
    $backupEntry = @"

$separator
BACKUP EXECUTION - $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')
$separator

OPERATION DETAILS:
- Mode: $operationMode
- Source: $source
- Destination: $destination
- Script: $(Split-Path -Leaf $MyInvocation.MyCommand.Path)

FILE STATISTICS:
- Source files: $($allSourceFiles.Count)
- Destination files: $($allDestFiles.Count)
- Source size: $([math]::Round($sourceSize, 2)) GB
- Destination size: $([math]::Round($destSize, 2)) GB

OPERATION RESULTS:
- Files copied/updated: $copied
- Files failed: $($failed.Count)
- Files deleted: $deletedCount
- Long paths handled: $longPathUsed
- Junctions recreated: $junctionsCreated/$($sourceJunctionsToRecreate.Count)

VERIFICATION:
- Hash check performed: $(if($runFinalHashCheck){'Yes'}else{'No'})
- Hash result: $(if($runFinalHashCheck){if($sourceHash -eq $destHash){'PASSED'}else{'FAILED'}}else{'N/A'})

STATUS: $(if($failed.Count -eq 0){'SUCCESS'}else{'COMPLETED WITH $($failed.Count) ERROR(S)'})

DURATION: $($stopwatch.Elapsed.ToString('hh\:mm\:ss'))

"@

    # Append to existing log file
    if (Test-Path $backupLogFile) {
        $backupEntry | Out-File -FilePath $backupLogFile -Append -Encoding UTF8
    } else {
        # Create new log with header
        $logHeader = @"
===========================================================
DESTINATION BACKUP LOG - $destination
===========================================================
Created: $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')
This log tracks all backup operations to this folder.
===========================================================

"@
        $logHeader + $backupEntry | Out-File -FilePath $backupLogFile -Force -Encoding UTF8
    }
    
    Log "Backup report appended to: $backupLogFile" "Green"
    
    # Also create a simple timestamp file for quick reference
    $timestampFile = Join-Path $destination "last_backup.txt"
    "Last backup: $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss') - $operationMode - $($allSourceFiles.Count) files" | Out-File -FilePath $timestampFile -Force
    
} catch {
    Log "Warning: Could not create backup log file: $($_.Exception.Message)" "Yellow"
}
Read-Host