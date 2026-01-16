# Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
# 1. Navigate to your target folder
#cd "/c/Users/YourName/Desktop/my_deep_folders"

# 2. Run the script (it will process current directory)
#/path/to/flatten_folders.sh

# Save this entire content as flatten_folders_fixed.ps1

#.\flatten_folders.ps1 -MaxDepth 2

# See what would move if keeping max 1 level deep
#.\flatten_folders.ps1 -MaxDepth 1 -WhatIf

# Actually flatten to max 2 levels
#.\flatten_folders.ps1 -MaxDepth 2

# Flatten a different folder to max 3 levels (dry run)
#.\flatten_folders.ps1 -RootPath "C:\Downloads\DeepStuff" -MaxDepth 3 -WhatIf


# FOLDER FLATTENER WITH WHATIF OPTION
param(
    [string]$RootPath = ".",
    [int]$MaxDepth = 2,
    [switch]$WhatIf
)

Write-Host "=== FOLDER FLATTENER ===" -ForegroundColor Cyan
Write-Host "Max depth: $MaxDepth (files deeper than this will move up)" -ForegroundColor Yellow
Write-Host "Root folder: $RootPath" -ForegroundColor Yellow

if ($WhatIf) {
    Write-Host "MODE: DRY RUN (WhatIf) - No files will actually be moved" -ForegroundColor Green
} else {
    Write-Host "MODE: LIVE - Files WILL be moved!" -ForegroundColor Red
    Write-Host "Starting in 3 seconds (Ctrl+C to cancel)..." -ForegroundColor Red
    Start-Sleep -Seconds 3
}

# Get absolute starting path
$startingPath = Resolve-Path $RootPath
$startingDepth = ($startingPath.Path -split '[\\/]').Count

# Counters
$wouldMove = 0
$wouldKeep = 0
$errors = 0

# Get all files
$files = Get-ChildItem -Path $startingPath -File -Recurse
Write-Host "Found $($files.Count) files to check" -ForegroundColor Gray
Write-Host ""

foreach ($file in $files) {
    try {
        # Get file's absolute path
        $filePath = $file.FullName
        
        # Calculate depth RELATIVE TO STARTING FOLDER
        $fileDepth = ($filePath -split '[\\/]').Count
        $relativeDepth = $fileDepth - $startingDepth - 1  # -1 because we count directories only
        if ($relativeDepth -lt 0) { $relativeDepth = 0 }
        
        # Get relative path for display
        $relativePath = $filePath.Substring($startingPath.Path.Length + 1)
        
        # Skip if already at acceptable depth
        if ($relativeDepth -lt $MaxDepth) {
            Write-Host "KEEP: $relativePath (depth $relativeDepth)" -ForegroundColor DarkGreen
            $wouldKeep++
            continue
        }
        
        # File needs moving (too deep)
        Write-Host "MOVE: $relativePath (depth $relativeDepth >= $MaxDepth)" -ForegroundColor Yellow
        
        # Get the directory structure
        $dirPath = [System.IO.Path]::GetDirectoryName($relativePath)
        $pathParts = $dirPath -split '[\\/]'
        
        # Keep only first (MaxDepth-1) directory levels FROM STARTING POINT
        if ($pathParts.Count -ge ($MaxDepth - 1)) {
            $newDirParts = $pathParts[0..($MaxDepth - 2)]
        } else {
            $newDirParts = $pathParts
        }
        
        # Build new directory path
        if ($newDirParts.Count -eq 0) {
            $newDir = $startingPath
        } else {
            $newDir = Join-Path -Path $startingPath -ChildPath ($newDirParts -join '\')
        }
        
        # Create directory if needed (only in live mode)
        if (-not $WhatIf) {
            if (-not (Test-Path $newDir)) {
                New-Item -ItemType Directory -Path $newDir -Force | Out-Null
            }
        }
        
        # Handle duplicate filenames
        $destFile = Join-Path $newDir $file.Name
        $counter = 1
        while (Test-Path $destFile) {
            $name = [System.IO.Path]::GetFileNameWithoutExtension($file.Name)
            $ext = [System.IO.Path]::GetExtension($file.Name)
            $destFile = Join-Path $newDir "${name}_${counter}${ext}"
            $counter++
        }
        
        # Show destination
        $destRelative = $destFile.Substring($startingPath.Path.Length + 1)
        Write-Host "  -> To: $destRelative" -ForegroundColor Green
        
        # Move the file (with or without WhatIf)
        if ($WhatIf) {
            # Just show what would happen
            Write-Host "  [WhatIf] Would move file" -ForegroundColor DarkGray
        } else {
            # Actually move
            Move-Item -Path $file.FullName -Destination $destFile -Force
        }
        
        $wouldMove++
        
    } catch {
        Write-Host "ERROR: $($file.Name) - $_" -ForegroundColor Red
        $errors++
    }
}

# Clean up empty directories (only in live mode)
if (-not $WhatIf) {
    Write-Host "`nCleaning empty directories..." -ForegroundColor Cyan
    Get-ChildItem -Path $startingPath -Directory -Recurse | 
        Sort-Object -Property FullName -Descending | 
        Where-Object { 
            $_.GetFiles().Count -eq 0 -and $_.GetDirectories().Count -eq 0 
        } | ForEach-Object {
            $emptyDir = $_.FullName.Substring($startingPath.Path.Length + 1)
            Write-Host "Remove: $emptyDir" -ForegroundColor DarkGray
            Remove-Item -Path $_.FullName -Force
        }
}

Write-Host "`n=== RESULTS ===" -ForegroundColor Cyan
if ($WhatIf) {
    Write-Host "DRY RUN COMPLETE" -ForegroundColor Green
    Write-Host "Files that WOULD be moved: $wouldMove" -ForegroundColor Yellow
    Write-Host "Files that WOULD stay: $wouldKeep" -ForegroundColor Green
    Write-Host "`nTo actually run, remove -WhatIf flag" -ForegroundColor Cyan
} else {
    Write-Host "LIVE RUN COMPLETE" -ForegroundColor Green
    Write-Host "Files moved up: $wouldMove" -ForegroundColor Green
    Write-Host "Files kept in place: $wouldKeep" -ForegroundColor Yellow
}
Write-Host "Errors: $errors" -ForegroundColor $(if ($errors -gt 0) { "Red" } else { "Gray" })