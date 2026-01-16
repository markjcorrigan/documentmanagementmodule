<#
=============================================================
Enhanced Ultimate PowerShell Mirror Script - PROD VERSION
=============================================================
Features:
- Hash verification (SHA256) for every file
- Automatic retry on failures (3 attempts)
- Long path support (>260 chars)
- Proper junction handling
- IGNORE folders from source (don't copy them)
- EXCLUDE specific files from source (by pattern)
- Progress tracking with ETA
- Comprehensive logging
- Final verification (excluding ignored folders and excluded files)

How to run:
1. Open PowerShell 7+ as Administrator
2. Run: .\TRUEMIRROR_PROD.ps1
3. Log file: C:\enhanced_mirror.log
#>

# ===================== CONFIG =====================
$source = "C:\xampp\htdocs\pmway.hopto.org"        # Source folder
$destination = "E:\pmway"   # Destination folder
$logFile = "C:\enhanced_mirror.log"      # Log file location
$maxRetries = 3                          # Max retries per file
$progressInterval = 10                   # Progress update frequency (every N files)
$enableFinalHashCheck = $true            # Final folder hash verification
$recreateJunctions = $false              # Recreate junctions properly
$largeFileSizeMB = 50                    # Show progress for files larger than this (MB)

# ===================== DRIVE CONFIGURATION =====================
$destinationDrive = "E"  # Destination drive letter

# ===================== IGNORE RULES (SOURCE) =====================
$ignoreFoldersInDest = @(
  
)

# ===================== FILE EXCLUSION RULES =====================
$excludeFiles = @(
  
)

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
Log "Timestamp:   $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"
Log "Mode:        SELECTIVE MIRROR (ignoring specific folders)"

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

# ===================== DELETE DESTINATION CONTENTS =====================
Log-Header "PREPARING DESTINATION"
if (Test-Path $destination) {
    Log "Destination folder exists: $destination" "Yellow"
    
    # Check if destination has any contents
    $destContents = Get-ChildItem -LiteralPath $destination -Force -ErrorAction SilentlyContinue
    if ($destContents.Count -gt 0) {
        Write-Host "`nWARNING: Destination folder contains $($destContents.Count) item(s)" -ForegroundColor Yellow
        Write-Host "Do you want to DELETE ALL contents in the destination folder?" -ForegroundColor Yellow
        Write-Host "Folder: $destination" -ForegroundColor Cyan
        Write-Host "`nType 'YES' to delete all contents and proceed, or 'NO' to exit: " -ForegroundColor Yellow -NoNewline
        
        $response = Read-Host
        
        if ($response -eq "YES") {
            Log "User confirmed deletion of destination contents" "Yellow"
            Log "Deleting all contents in: $destination" "Yellow"
            
            try {
                # Delete all contents but keep the folder
                Get-ChildItem -LiteralPath $destination -Force -ErrorAction Stop | ForEach-Object {
                    try {
                        if ($_.Attributes -band [System.IO.FileAttributes]::ReadOnly) {
                            $_.Attributes = $_.Attributes -bxor [System.IO.FileAttributes]::ReadOnly
                        }
                        Remove-Item -LiteralPath $_.FullName -Recurse -Force -ErrorAction Stop
                    } catch {
                        Log "Warning: Could not delete: $($_.FullName) - $($_.Exception.Message)" "Yellow"
                    }
                }
                Log "✓ Destination contents deleted successfully" "Green"
            } catch {
                Log "ERROR: Could not delete destination contents - $($_.Exception.Message)" "Red"
                Write-Host "`nPress ENTER to exit..."
                Read-Host
                exit 1
            }
        } else {
            Log "User declined deletion - operation cancelled" "Red"
            Write-Host "`nOperation cancelled by user." -ForegroundColor Red
            Write-Host "Press ENTER to exit..."
            Read-Host
            exit 0
        }
    } else {
        Log "Destination folder is empty - no deletion needed" "Green"
    }
} else {
    # Create destination folder if it doesn't exist
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

# ===================== CHECK FOR JUNCTIONS IN SOURCE =====================
Log-Header "DETECTING JUNCTIONS IN SOURCE"
$sourceJunctions = Get-ChildItem $source -Recurse -Force -ErrorAction SilentlyContinue | 
    Where-Object { $_.Attributes -band [System.IO.FileAttributes]::ReparsePoint }

# Filter out junctions in ignored folders
$sourceJunctionsToRecreate = $sourceJunctions | Where-Object {
    $relativePath = $_.FullName.Substring($source.Length).TrimStart('\')
    -not (Test-ShouldIgnore $relativePath)
}

if ($sourceJunctionsToRecreate.Count -gt 0) {
    Log "Found $($sourceJunctionsToRecreate.Count) junction(s) in source (excluding ignored folders):"
    foreach ($j in $sourceJunctionsToRecreate) {
        $relativePath = $j.FullName.Substring($source.Length).TrimStart('\')
        Log "  - $relativePath -> $($j.Target)" "Cyan"
    }
} else {
    Log "No junctions to recreate (or all are in ignored folders)."
}

if ($sourceJunctions.Count -gt $sourceJunctionsToRecreate.Count) {
    $skippedJunctions = $sourceJunctions.Count - $sourceJunctionsToRecreate.Count
    Log "Note: Skipped $skippedJunctions junction(s) in ignored folders" "Gray"
}

# ===================== MIRROR WITH HASH VERIFICATION =====================
Log-Header "COPYING AND VERIFYING FILES"

# Get all files EXCEPT those in ignored folders OR matching file exclusion patterns
$sourceFiles = Get-ChildItem -Path $source -Recurse -File -Force -ErrorAction SilentlyContinue | Where-Object {
    $relativePath = $_.FullName.Substring($source.Length).TrimStart('\')
    $shouldInclude = -not (Test-ShouldIgnore $relativePath) -and -not (Test-ShouldExcludeFile $_.Name)
    $shouldInclude
}

$totalFiles = $sourceFiles.Count
$copied = 0
$failed = @()
$skipped = 0
$longPathUsed = 0
$processed = 0
$largeFilesProcessed = @()
$stopwatch = [System.Diagnostics.Stopwatch]::StartNew()

function Update-ETA($processed, $total) {
    if ($processed -eq 0) { return "calculating..." }
    $elapsed = $stopwatch.Elapsed.TotalSeconds
    $etaSec = ($elapsed / $processed) * ($total - $processed)
    $eta = [TimeSpan]::FromSeconds($etaSec)
    return "{0:hh\:mm\:ss}" -f $eta
}

Log "Total files to copy: $totalFiles (ignored folders and excluded files not counted)"
Log "Starting copy with hash verification..."

foreach ($file in $sourceFiles) {
    $relativePath = $file.FullName.Substring($source.Length).TrimStart('\')
    
    # Double-check (should already be filtered)
    if (Test-ShouldIgnore $relativePath) {
        $skipped++
        continue
    }
    
    if (Test-ShouldExcludeFile $file.Name) {
        $skipped++
        continue
    }
    
    $destFile = Join-Path $destination $relativePath
    $destFolder = Split-Path $destFile
    
    # Show progress for large files
    $fileSizeMB = [math]::Round($file.Length / 1MB, 2)
    if ($fileSizeMB -ge $largeFileSizeMB) {
        $pct = [math]::Round(($processed / $totalFiles) * 100, 1)
        Write-Host "[$pct%] Processing large file ($fileSizeMB MB):" -ForegroundColor Yellow
        Write-Host "  Path: $relativePath" -ForegroundColor Cyan
        Log "Large file ($fileSizeMB MB): $relativePath"
        
        # Track for summary
        $largeFilesProcessed += [PSCustomObject]@{
            Path = $relativePath
            SizeMB = $fileSizeMB
        }
    }
    
    # Create destination folder with long path support
    if (-not (Test-Path -LiteralPath $destFolder)) {
        try {
            New-Item -ItemType Directory -Path $destFolder -Force -ErrorAction Stop | Out-Null
        } catch {
            if ($_.Exception.Message -match "PathTooLong" -or $_.Exception.Message -match "path.*too long") {
                try {
                    New-Item -ItemType Directory -Path (Get-LongPath $destFolder) -Force -ErrorAction Stop | Out-Null
                } catch {
                    Log "FAILED to create directory: $destFolder - $_" "Red"
                }
            } else {
                Log "FAILED to create directory: $destFolder - $_" "Red"
            }
        }
    }
    
    $attempt = 0
    $success = $false
    $usedLongPath = $false
    
    while (-not $success -and $attempt -lt $maxRetries) {
        $attempt++
        try {
            # Try normal copy first
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

# ===================== DELETE EXTRA FILES (RESPECT IGNORE RULES) =====================
Log-Header "CLEANING UP EXTRA FILES"
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

Log "Source Statistics (excluding ignored folders and excluded files):"
Log "  Files: $($allSourceFiles.Count)"
Log "  Size:  $([math]::Round($sourceSize, 2)) GB"

Log "`nDestination Statistics (excluding ignored folders and excluded files):"
Log "  Files: $($allDestFiles.Count)"
Log "  Size:  $([math]::Round($destSize, 2)) GB"

if ($sourceIgnoredFolders.Count -gt 0 -or ($excludeFiles.Count -gt 0 -and $sourceExcludedFiles.Count -gt 0)) {
    Log "`nExclusions Summary:"
    if ($sourceIgnoredFolders.Count -gt 0) {
        Log "  Folders in source (NOT copied): $($sourceIgnoredFolders.Count)" "Yellow"
    }
    if ($excludeFiles.Count -gt 0 -and $sourceExcludedFiles.Count -gt 0) {
        Log "  Files in source (EXCLUDED): $($sourceExcludedFiles.Count)" "Yellow"
    }
}

Log "`nOperation Results:"
Log "  ✓ Files copied: $copied" "Green"
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
if ($enableFinalHashCheck -and $failed.Count -eq 0) {
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
}

# ===================== FINAL STATUS =====================
Log-Header "MIRROR COMPLETED"

if ($failed.Count -eq 0) {
    if ($enableFinalHashCheck -and $sourceHash -eq $destHash) {
        Log "✅ SUCCESS - FULL MIRROR VERIFIED!" "Green"
        Log "   All files copied and hash verification passed." "Green"
        Log "   Source and destination are identical (excluding ignored folders and excluded files)." "Green"
    } else {
        Log "✅ SUCCESS - All files copied!" "Green"
        Log "   The destination mirrors the source (excluding ignored folders and excluded files)." "Green"
        if (-not $enableFinalHashCheck) {
            Log "   Enable final hash check for additional verification." "Gray"
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
Read-Host
