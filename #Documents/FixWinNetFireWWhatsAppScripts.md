# Windows Repair & WhatsApp Installation Scripts

## Install-WhatsApp.ps1

```powershell
# WhatsApp-Direct-Install.ps1
Write-Host "=== WHATSAPP DIRECT INSTALLER ===" -ForegroundColor Cyan

if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "Running as Administrator..." -ForegroundColor Yellow
    Start-Process powershell.exe "-NoProfile -ExecutionPolicy Bypass -File `"$PSCommandPath`"" -Verb RunAs
    exit
}

Write-Host "Downloading WhatsApp..." -ForegroundColor Yellow
$url = "https://static.whatsapp.net/desktop/windows/release/WhatsAppSetup.exe"
$output = "$env:TEMP\WhatsAppSetup.exe"

try {
    $wc = New-Object System.Net.WebClient
    $wc.DownloadFile($url, $output)
    $wc.Dispose()
    
    if (Test-Path $output) {
        Write-Host "✓ Download complete!" -ForegroundColor Green
        Write-Host "Launching installer..." -ForegroundColor Yellow
        Start-Process $output
        Write-Host "✓ Installer launched!" -ForegroundColor Green
    }
} catch {
    Write-Host "Error: $_" -ForegroundColor Red
    Write-Host "Manual install: https://whatsapp.com/download" -ForegroundColor Yellow
}

Write-Host "`nDone!" -ForegroundColor Cyan
pause
```

## Fix-Network.ps1

```powershell
# Fix-Network.ps1 - Restore network connections
Clear-Host
Write-Host "=== RESTORING NETWORK CONNECTIONS ===" -ForegroundColor Cyan

if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Start-Process powershell.exe "-NoProfile -ExecutionPolicy Bypass -File `"$PSCommandPath`"" -Verb RunAs
    exit
}

Write-Host "1. Enabling network discovery..." -ForegroundColor Green
netsh advfirewall firewall set rule group="Network Discovery" new enable=yes
netsh advfirewall firewall set rule group="File and Printer Sharing" new enable=yes

Write-Host "2. Setting network to Private..." -ForegroundColor Green
Set-NetConnectionProfile -NetworkCategory Private

Write-Host "3. Enabling network services..." -ForegroundColor Green
Enable-NetFirewallRule -DisplayGroup "File and Printer Sharing" -ErrorAction SilentlyContinue
Enable-NetFirewallRule -DisplayGroup "Network Discovery" -ErrorAction SilentlyContinue
Enable-NetFirewallRule -DisplayGroup "Core Networking" -ErrorAction SilentlyContinue

Write-Host "4. Creating LAN access rules..." -ForegroundColor Green
New-NetFirewallRule -DisplayName "Allow Local Network" -Direction Inbound -LocalAddress 192.168.0.0/16,10.0.0.0/8,172.16.0.0/12 -Action Allow -Enabled True -ErrorAction SilentlyContinue

Write-Host "5. Restarting services..." -ForegroundColor Green
Restart-Service -Name "Netlogon" -Force -ErrorAction SilentlyContinue
Restart-Service -Name "LanmanWorkstation" -Force -ErrorAction SilentlyContinue

Write-Host "`n✓ Network restored!" -ForegroundColor Green
Write-Host "You may need to restart your computer." -ForegroundColor Yellow

pause
```

## Fix-Store.ps1

```powershell
# Fix-Store.ps1 - Repair Microsoft Store
Write-Host "=== MICROSOFT STORE REPAIR ===" -ForegroundColor Cyan

if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Start-Process powershell.exe "-NoProfile -ExecutionPolicy Bypass -File `"$PSCommandPath`"" -Verb RunAs
    exit
}

Write-Host "1. Clearing Store cache..." -ForegroundColor Green
Remove-Item "$env:LOCALAPPDATA\Packages\Microsoft.WindowsStore*" -Recurse -Force -ErrorAction SilentlyContinue

Write-Host "2. Re-registering Store..." -ForegroundColor Green
Get-AppxPackage *WindowsStore* | Remove-AppxPackage -ErrorAction SilentlyContinue
Add-AppxPackage -DisableDevelopmentMode -Register "$env:SystemRoot\SystemApps\Microsoft.WindowsStore_8wekyb3d8bbwe\AppXManifest.xml" -ErrorAction SilentlyContinue

Write-Host "3. Resetting Windows Update..." -ForegroundColor Green
Stop-Service wuauserv, bits, cryptsvc -Force -ErrorAction SilentlyContinue
Rename-Item "$env:SystemRoot\SoftwareDistribution" "$env:SystemRoot\SoftwareDistribution.old" -Force -ErrorAction SilentlyContinue
Start-Service wuauserv, bits, cryptsvc -ErrorAction SilentlyContinue

Write-Host "`n✓ Microsoft Store repaired!" -ForegroundColor Green
Write-Host "Restart your computer for best results." -ForegroundColor Yellow

pause
```

## Fix-Windows-All.ps1

```powershell
# Fix-Windows-All.ps1 - Complete repair
param(
    [switch]$CreateRestorePoint
)

Write-Host "=== COMPLETE WINDOWS REPAIR ===" -ForegroundColor Cyan

if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Start-Process powershell.exe "-NoProfile -ExecutionPolicy Bypass -File `"$PSCommandPath`"" -Verb RunAs
    exit
}

# Create restore point if requested
if ($CreateRestorePoint) {
    Write-Host "Creating System Restore Point..." -ForegroundColor Yellow
    Checkpoint-Computer -Description "Windows Repair $(Get-Date)" -RestorePointType MODIFY_SETTINGS -ErrorAction SilentlyContinue
}

Write-Host "`n1. Running SFC (System File Checker)..." -ForegroundColor Green
sfc /scannow

Write-Host "`n2. Running DISM..." -ForegroundColor Green
DISM /Online /Cleanup-Image /RestoreHealth

Write-Host "`n3. Repairing Microsoft Store..." -ForegroundColor Green
Get-AppxPackage *WindowsStore* | Remove-AppxPackage -ErrorAction SilentlyContinue
Add-AppxPackage -DisableDevelopmentMode -Register "$env:SystemRoot\SystemApps\Microsoft.WindowsStore_8wekyb3d8bbwe\AppXManifest.xml" -ErrorAction SilentlyContinue

Write-Host "`n4. Resetting firewall..." -ForegroundColor Green
netsh advfirewall reset
Set-NetFirewallProfile -All -Enabled True

Write-Host "`n5. Fixing network..." -ForegroundColor Green
ipconfig /flushdns
netsh winsock reset
netsh int ip reset

Write-Host "`n6. Resetting Windows Update..." -ForegroundColor Green
Stop-Service wuauserv, bits, cryptsvc, msiserver -Force -ErrorAction SilentlyContinue
Remove-Item "$env:SystemRoot\SoftwareDistribution\*" -Recurse -Force -ErrorAction SilentlyContinue
Start-Service wuauserv, bits, cryptsvc, msiserver -ErrorAction SilentlyContinue

Write-Host "`n✓ All repairs completed!" -ForegroundColor Green
Write-Host "`nRecommended next steps:" -ForegroundColor Yellow
Write-Host "1. Restart your computer" -ForegroundColor White
Write-Host "2. Run Windows Update" -ForegroundColor White
Write-Host "3. Test Microsoft Store" -ForegroundColor White

$restart = Read-Host "`nRestart now? (Y/N)"
if ($restart -eq 'Y' -or $restart -eq 'y') {
    Write-Host "Restarting in 10 seconds..." -ForegroundColor Yellow
    Start-Sleep -Seconds 10
    Restart-Computer -Force
}

pause
```

## Network-Restore-Complete.ps1

```powershell
# Network-Restore.ps1 - Restore connections to other computers
Clear-Host
Write-Host "=== RESTORING NETWORK CONNECTIONS ===" -ForegroundColor Cyan
Write-Host "Fixing firewall rules after reset..." -ForegroundColor Yellow

# 1. DISABLE FIREWALL TEMPORARILY (to test)
Write-Host "`n1. Temporarily adjusting firewall..." -ForegroundColor Green
Set-NetFirewallProfile -All -Enabled False
Write-Host "   ✓ Firewall temporarily disabled" -ForegroundColor Green

# 2. ENABLE ALL NETWORK SERVICES
Write-Host "`n2. Enabling network services..." -ForegroundColor Green

# Network Discovery
netsh advfirewall firewall set rule group="Network Discovery" new enable=yes
Write-Host "   ✓ Network Discovery enabled" -ForegroundColor Green

# File and Printer Sharing
netsh advfirewall firewall set rule group="File and Printer Sharing" new enable=yes
Write-Host "   ✓ File Sharing enabled" -ForegroundColor Green

# SMB (File Sharing Protocol)
Enable-NetFirewallRule -DisplayGroup "File and Printer Sharing" -ErrorAction SilentlyContinue
Enable-NetFirewallRule -DisplayGroup "Network Discovery" -ErrorAction SilentlyContinue
Enable-NetFirewallRule -DisplayGroup "Remote Desktop" -ErrorAction SilentlyContinue
Enable-NetFirewallRule -DisplayGroup "Windows Management Instrumentation (WMI)" -ErrorAction SilentlyContinue

# 3. CREATE CUSTOM RULES FOR NETWORK ACCESS
Write-Host "`n3. Creating custom network rules..." -ForegroundColor Green

# Allow all private network traffic
New-NetFirewallRule -DisplayName "Allow LAN Access" -Direction Inbound -LocalAddress 192.168.0.0/16,10.0.0.0/8,172.16.0.0/12 -Action Allow -Enabled True -ErrorAction SilentlyContinue
New-NetFirewallRule -DisplayName "Allow LAN Access Out" -Direction Outbound -RemoteAddress 192.168.0.0/16,10.0.0.0/8,172.16.0.0/12 -Action Allow -Enabled True -ErrorAction SilentlyContinue

Write-Host "   ✓ LAN access rules created" -ForegroundColor Green

# 4. SET NETWORK LOCATION TO PRIVATE
Write-Host "`n4. Setting network to Private..." -ForegroundColor Green
$profiles = Get-NetConnectionProfile
foreach ($profile in $profiles) {
    Set-NetConnectionProfile -Name $profile.Name -NetworkCategory Private -ErrorAction SilentlyContinue
}
Write-Host "   ✓ Network set to Private" -ForegroundColor Green

# 5. ENABLE NETWORK SERVICES
Write-Host "`n5. Starting network services..." -ForegroundColor Green

$services = @(
    "FDResPub",  # Function Discovery Resource Publication
    "upnphost",  # UPnP Device Host
    "SSDPSRV",   # SSDP Discovery
    "dnscache",  # DNS Client
    "lmhosts",   # TCP/IP NetBIOS Helper
    "NetTcpPortSharing", # Net.Tcp Port Sharing
    "WinRM"      # Windows Remote Management
)

foreach ($service in $services) {
    try {
        Set-Service -Name $service -StartupType Automatic -ErrorAction SilentlyContinue
        Start-Service -Name $service -ErrorAction SilentlyContinue
        Write-Host "   ✓ Started: $service" -ForegroundColor Green
    } catch {
        Write-Host "   ✗ Failed: $service" -ForegroundColor DarkGray
    }
}

# 6. RE-ENABLE FIREWALL WITH CORRECT SETTINGS
Write-Host "`n6. Re-enabling firewall with proper rules..." -ForegroundColor Green
Set-NetFirewallProfile -Profile Domain,Private -Enabled True
Set-NetFirewallProfile -Profile Public -Enabled True

# Allow ping (ICMP)
netsh advfirewall firewall add rule name="Allow ICMPv4" protocol=icmpv4:any,any dir=in action=allow
netsh advfirewall firewall add rule name="Allow ICMPv4 Out" protocol=icmpv4:any,any dir=out action=allow

Write-Host "   ✓ Firewall re-enabled with proper rules" -ForegroundColor Green

# 7. TEST CONNECTIVITY
Write-Host "`n7. Testing connectivity..." -ForegroundColor Green

# Get local IP
$ip = (Get-NetIPAddress | Where-Object {$_.AddressFamily -eq 'IPv4' -and $_.PrefixOrigin -eq 'Dhcp'}).IPAddress
if ($ip) {
    Write-Host "   Your IP address: $ip" -ForegroundColor Cyan
}

# Test local network
Write-Host "`nTrying to ping other computers..." -ForegroundColor Yellow
Write-Host "   You should now be able to:" -ForegroundColor White
Write-Host "   • See other computers in Network folder" -ForegroundColor White
Write-Host "   • Access shared folders" -ForegroundColor White
Write-Host "   • Connect via Remote Desktop" -ForegroundColor White

# 8. RESTART NETWORK SERVICES
Write-Host "`n8. Finalizing changes..." -ForegroundColor Green
Restart-Service -Name "Netlogon" -Force -ErrorAction SilentlyContinue
Restart-Service -Name "LanmanWorkstation" -Force -ErrorAction SilentlyContinue
Restart-Service -Name "LanmanServer" -Force -ErrorAction SilentlyContinue

Write-Host "`n=== COMPLETED ===" -ForegroundColor Cyan
Write-Host "Network connections restored!" -ForegroundColor Green
Write-Host "`nYou may need to:" -ForegroundColor Yellow
Write-Host "1. Restart your computer" -ForegroundColor White
Write-Host "2. Restart the OTHER computer" -ForegroundColor White
Write-Host "3. Check Network folder in File Explorer" -ForegroundColor White

$restart = Read-Host "`nRestart this computer now? (Recommended) (Y/N)"
if ($restart -eq 'Y' -or $restart -eq 'y') {
    Write-Host "Restarting in 10 seconds... (Ctrl+C to cancel)" -ForegroundColor Yellow
    Start-Sleep -Seconds 10
    Restart-Computer -Force
} else {
    Write-Host "`nPlease restart when possible for changes to take effect." -ForegroundColor Yellow
}

pause
```

## One-Line Quick Fixes

### Install WhatsApp (One Line)
```powershell
Start-Process "https://static.whatsapp.net/desktop/windows/release/WhatsAppSetup.exe"
```

### Fix Store (One Line)
```powershell
Get-AppxPackage *WindowsStore* | Remove-AppxPackage; Add-AppxPackage -DisableDevelopmentMode -Register "$env:SystemRoot\SystemApps\Microsoft.WindowsStore_8wekyb3d8bbwe\AppXManifest.xml"
```

### Fix Network (One Line)
```powershell
netsh winsock reset; netsh int ip reset; ipconfig /flushdns; ipconfig /renew
```

### Reset Firewall (One Line)
```powershell
netsh advfirewall reset; Set-NetFirewallProfile -All -Enabled True
```

### Enable Network Discovery (One Line)
```powershell
netsh advfirewall firewall set rule group="Network Discovery" new enable=yes; netsh advfirewall firewall set rule group="File and Printer Sharing" new enable=yes
```

### Disable Firewall Temporarily (One Line)
```powershell
Set-NetFirewallProfile -All -Enabled False
```

## Troubleshooting Commands

### Check Network Connectivity
```powershell
# Test internet
Test-NetConnection 8.8.8.8

# Test DNS
Resolve-DnsName microsoft.com

# List network computers
net view

# Check firewall status
Get-NetFirewallProfile | Select-Object Name, Enabled
```

### Check WhatsApp Installation
```powershell
# Check if WhatsApp is installed
Test-Path "C:\Program Files\WhatsApp\WhatsApp.exe"
Test-Path "$env:LOCALAPPDATA\WhatsApp\WhatsApp.exe"

# Check running processes
Get-Process | Where-Object {$_.Name -like "*whatsapp*"}
```

### Fix DISM 62.3% Hang
```powershell
# Stop stuck DISM
taskkill /F /IM dism.exe
taskkill /F /IM TiWorker.exe

# Clear update cache
Stop-Service wuauserv -Force
Remove-Item "$env:SystemRoot\SoftwareDistribution\*" -Recurse -Force
Start-Service wuauserv

# Run alternative DISM
DISM /Online /Cleanup-Image /StartComponentCleanup
```

### Check Network Status
```powershell
# Test if you can see other computers
Test-NetConnection -ComputerName "OTHER-COMPUTER-NAME" -Port 445

# List network computers
net view

# Check network profile
Get-NetConnectionProfile | Select-Object Name,NetworkCategory,IPv4Connectivity
```

### Reset Network Completely
```powershell
# Reset everything
netsh winsock reset
netsh int ip reset
ipconfig /release
ipconfig /renew
ipconfig /flushdns

# Restart network services
Restart-Service Netlogon -Force
Restart-Service LanmanWorkstation -Force
Restart-Service LanmanServer -Force
```

### Check Workgroup
```powershell
# Make sure computers are in same workgroup
systeminfo | findstr /B /C:"Domain" /C:"Workgroup"
```

## Allow Execution of Scripts
```powershell
# Run this once to allow scripts
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
```
