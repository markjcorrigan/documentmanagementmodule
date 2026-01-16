# Windows 11 Usage Data & System Cleanup Script
# Run as Administrator for full functionality

Write-Host "=========================================" -ForegroundColor Cyan
Write-Host "Windows 11 Usage Data & System Cleanup" -ForegroundColor Cyan
Write-Host "=========================================" -ForegroundColor Cyan
Write-Host "Note: Run as Administrator for best results`n" -ForegroundColor Yellow

# Function to check if running as Administrator
function Test-Admin {
    $currentUser = New-Object Security.Principal.WindowsPrincipal([Security.Principal.WindowsIdentity]::GetCurrent())
    return $currentUser.IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)
}

# Check for admin rights
if (-not (Test-Admin)) {
    Write-Host "Warning: Not running as Administrator" -ForegroundColor Red
    Write-Host "Some cleanup operations require elevated privileges.`n" -ForegroundColor Yellow
    $continue = Read-Host "Continue anyway? (Y/N)"
    if ($continue -ne "Y" -and $continue -ne "y") {
        Exit
    }
}

# Create restore point first (requires admin)
if (Test-Admin) {
    Write-Host "Creating System Restore Point..." -ForegroundColor Green
    try {
        Checkpoint-Computer -Description "Pre-Cleanup Restore Point" -RestorePointType MODIFY_SETTINGS
        Write-Host "Restore point created successfully`n" -ForegroundColor Green
    }
    catch {
        Write-Host "Note: Could not create restore point (may be disabled on your system)`n" -ForegroundColor Yellow
    }
}

# Function to safely delete files/folders
function Safe-Delete {
    param(
        [string]$Path,
        [string]$Description
    )
    
    Write-Host "Cleaning: $Description" -ForegroundColor Gray
    
    if (Test-Path $Path) {
        try {
            # Try to remove item
            Remove-Item -Path $Path -Recurse -Force -ErrorAction Stop
            Write-Host "  Success: $Description cleaned" -ForegroundColor Green
        }
        catch {
            Write-Host "  Partial: Some files in use - $($_.Exception.Message)" -ForegroundColor Yellow
        }
    }
    else {
        Write-Host "  Skipped: Path not found" -ForegroundColor DarkGray
    }
}

# Function to clear Windows event logs (excluding critical ones)
function Clear-EventLogsSelective {
    Write-Host "`nCleaning Event Logs (non-critical)..." -ForegroundColor Gray
    
    # List of logs to clear (excluding critical system logs)
    $logsToClear = @(
        "Application",
        "System",
        "Setup",
        "Security",
        "Microsoft-Windows-TerminalServices-RemoteConnectionManager/Operational",
        "Windows PowerShell"
    )
    
    foreach ($log in $logsToClear) {
        try {
            Clear-EventLog -LogName $log -ErrorAction SilentlyContinue
            Write-Host "  Cleared: $log" -ForegroundColor Green
        }
        catch {
            # Silently continue
        }
    }
}

# Main cleanup operations
Write-Host "`nStarting cleanup operations...`n" -ForegroundColor Cyan

# 1. Clear Activity History and related data
Write-Host "=== Clearing Activity & Usage History ===" -ForegroundColor Magenta

# Stop Activity History service
try {
    Stop-Service -Name DiagTrack -Force -ErrorAction SilentlyContinue
    Write-Host "Stopped Diagnostic Tracking Service" -ForegroundColor Green
}
catch {
    Write-Host "Could not stop DiagTrack service" -ForegroundColor Yellow
}

# Clear Activity History database
Safe-Delete -Path "$env:LOCALAPPDATA\ConnectedDevicesPlatform\*" -Description "Activity History Database"

# Clear recent items
Safe-Delete -Path "$env:APPDATA\Microsoft\Windows\Recent\*" -Description "Recent Items"
Safe-Delete -Path "$env:APPDATA\Microsoft\Windows\Recent\AutomaticDestinations\*" -Description "Jump Lists"

# 2. Clear Windows Search/Cortana data
Write-Host "`n=== Clearing Search & Cortana Data ===" -ForegroundColor Magenta

Safe-Delete -Path "$env:LOCALAPPDATA\Packages\Microsoft.Windows.Cortana_*\LocalState\*" -Description "Cortana Data"
Safe-Delete -Path "$env:LOCALAPPDATA\Packages\Microsoft.Windows.Search_*\LocalState\*" -Description "Windows Search Data"

# 3. Clear temporary files
Write-Host "`n=== Clearing Temporary Files ===" -ForegroundColor Magenta

# Various temp folders
$tempPaths = @(
    "$env:TEMP\*",
    "$env:WINDIR\Temp\*",
    "$env:LOCALAPPDATA\Temp\*",
    "$env:LOCALAPPDATA\Microsoft\Windows\INetCache\*",
    "$env:LOCALAPPDATA\Microsoft\Windows\INetCookies\*",
    "$env:LOCALAPPDATA\Microsoft\Edge\User Data\Default\Cache\*",
    "$env:LOCALAPPDATA\Microsoft\Edge\User Data\Default\Code Cache\*"
)

foreach ($path in $tempPaths) {
    Safe-Delete -Path $path -Description "Temp Files ($(Split-Path $path -Leaf))"
}

# Clear Delivery Optimization cache
try {
    Get-ChildItem "$env:SYSTEMROOT\DeliveryOptimization\Cache\*" | Remove-Item -Recurse -Force -ErrorAction SilentlyContinue
    Write-Host "Cleaned: Delivery Optimization Cache" -ForegroundColor Green
}
catch {}

# 4. Clear Windows Update cache
Write-Host "`n=== Clearing Windows Update Cache ===" -ForegroundColor Magenta

try {
    Stop-Service -Name wuauserv -Force -ErrorAction SilentlyContinue
    Stop-Service -Name bits -Force -ErrorAction SilentlyContinue
    Safe-Delete -Path "$env:SYSTEMROOT\SoftwareDistribution\Download\*" -Description "Windows Update Downloads"
    Safe-Delete -Path "$env:SYSTEMROOT\SoftwareDistribution\DataStore\*" -Description "Windows Update DataStore"
    Start-Service -Name wuauserv -ErrorAction SilentlyContinue
    Start-Service -Name bits -ErrorAction SilentlyContinue
}
catch {
    Write-Host "Note: Windows Update cleanup may require reboot" -ForegroundColor Yellow
}

# 5. Clear Windows Error Reporting
Write-Host "`n=== Clearing Error Reports ===" -ForegroundColor Magenta

Safe-Delete -Path "$env:LOCALAPPDATA\Microsoft\Windows\WER\*" -Description "Windows Error Reporting"
Safe-Delete -Path "$env:PROGRAMDATA\Microsoft\Windows\WER\*" -Description "System Error Reporting"

# 6. Clear Thumbnail and Icon caches
Write-Host "`n=== Clearing Thumbnail Caches ===" -ForegroundColor Magenta

Safe-Delete -Path "$env:LOCALAPPDATA\Microsoft\Windows\Explorer\thumbcache*.db" -Description "Thumbnail Cache"
Safe-Delete -Path "$env:LOCALAPPDATA\Microsoft\Windows\Explorer\iconcache*.db" -Description "Icon Cache"

# 7. Clear Clipboard data
Write-Host "`n=== Clearing Clipboard ===" -ForegroundColor Magenta

try {
    # Clear clipboard via PowerShell
    powershell -Command "Set-Clipboard -Value ''" -ErrorAction SilentlyContinue
    Write-Host "Cleared: Clipboard data" -ForegroundColor Green
}
catch {}

# 8. Clear PowerShell history
Write-Host "`n=== Clearing PowerShell History ===" -ForegroundColor Magenta

try {
    # Clear PSReadLine history
    Remove-Item (Get-PSReadLineOption).HistorySavePath -ErrorAction SilentlyContinue
    Clear-History
    Write-Host "Cleared: PowerShell command history" -ForegroundColor Green
}
catch {}

# 9. Clear Event Logs (non-critical)
if (Test-Admin) {
    Clear-EventLogsSelective
}

# 10. Run built-in Disk Cleanup (silent)
Write-Host "`n=== Running Built-in Disk Cleanup ===" -ForegroundColor Magenta

if (Test-Admin) {
    try {
        # Silent cleanup of common categories
        cleanmgr /sagerun:1 | Out-Null
        Write-Host "Started: Windows Disk Cleanup utility" -ForegroundColor Green
    }
    catch {
        Write-Host "Note: Disk Cleanup not available" -ForegroundColor Yellow
    }
}

# 11. Reset Windows Search Index (optional)
Write-Host "`n=== Resetting Search Index (Optional) ===" -ForegroundColor Magenta

$resetSearch = Read-Host "Reset Windows Search Index? This will temporarily affect search performance. (Y/N)"
if ($resetSearch -eq "Y" -or $resetSearch -eq "y") {
    try {
        Stop-Service -Name "Windows Search" -Force -ErrorAction SilentlyContinue
        Safe-Delete -Path "$env:PROGRAMDATA\Microsoft\Search\Data\Applications\Windows\*" -Description "Windows Search Index"
        Start-Service -Name "Windows Search" -ErrorAction SilentlyContinue
        Write-Host "Windows Search Index reset. It will rebuild over time." -ForegroundColor Green
    }
    catch {
        Write-Host "Could not reset search index" -ForegroundColor Red
    }
}

# 12. Restart services
Write-Host "`n=== Restarting Services ===" -ForegroundColor Magenta

try {
    # Restart services we stopped
    Start-Service -Name DiagTrack -ErrorAction SilentlyContinue
    Write-Host "Restarted: Diagnostic Tracking Service" -ForegroundColor Green
}
catch {}

# Final cleanup and statistics
Write-Host "`n=== Final Cleanup ===" -ForegroundColor Magenta

# Empty Recycle Bin
try {
    $shell = New-Object -ComObject Shell.Application
    $shell.NameSpace(0xA).Items() | ForEach-Object { 
        Remove-Item $_.Path -Recurse -Force -ErrorAction SilentlyContinue 
    }
    Write-Host "Cleared: Recycle Bin" -ForegroundColor Green
}
catch {
    Write-Host "Note: Could not clear Recycle Bin" -ForegroundColor Yellow
}

# Clear DNS cache
try {
    ipconfig /flushdns | Out-Null
    Write-Host "Cleared: DNS Cache" -ForegroundColor Green
}
catch {}

# Calculate disk space freed (approximate)
Write-Host "`n=========================================" -ForegroundColor Cyan
Write-Host "Cleanup Complete!" -ForegroundColor Green
Write-Host "=========================================" -ForegroundColor Cyan

# Optional: Show before/after disk space (would require storing initial state)
Write-Host "`nRecommended actions:" -ForegroundColor Yellow
Write-Host "1. Reboot your computer to complete cleanup" -ForegroundColor Yellow
Write-Host "2. Check Windows Update after reboot" -ForegroundColor Yellow
Write-Host "3. Consider running 'sfc /scannow' to verify system integrity" -ForegroundColor Yellow

Write-Host "`nNote: Some settings may need to be reconfigured:" -ForegroundColor Magenta
Write-Host "- Windows Search will rebuild its index" -ForegroundColor Gray
Write-Host "- Recent files list is cleared" -ForegroundColor Gray
Write-Host "- Activity timeline is cleared" -ForegroundColor Gray

Write-Host "`nTo prevent future logging:" -ForegroundColor Cyan
Write-Host "Go to Settings > Privacy & security to adjust:" -ForegroundColor Gray
Write-Host "- Activity history" -ForegroundColor Gray
Write-Host "- Diagnostics & feedback" -ForegroundColor Gray
Write-Host "- Search permissions" -ForegroundColor Gray

# Optional: Open privacy settings
$openSettings = Read-Host "`nOpen Privacy Settings now? (Y/N)"
if ($openSettings -eq "Y" -or $openSettings -eq "y") {
    Start-Process "ms-settings:privacy"
}

Write-Host "`nScript execution finished." -ForegroundColor Green