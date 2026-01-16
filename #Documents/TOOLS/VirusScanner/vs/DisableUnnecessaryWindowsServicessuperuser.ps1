# Self-elevate and bypass execution policy
if (-NOT ([Security.Principal.WindowsPrincipal][Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Output "ERROR: This script must be run as Administrator!"
    Write-Output "Please close Visual Studio and run it as Administrator, then try again."
    Exit
}

# Script to disable unnecessary Windows Services, based on Microsoft Recommendation.
#
# https://docs.microsoft.com/en-us/windows-server/security/windows-services/security-guidelines-for-disabling-system-services-in-windows-server
# https://docs.microsoft.com/en-us/windows/application-management/per-user-services-in-windows

$WindowsSystemServices = @(
    "AxInstSV", # ActiveX Installer (AxInstSV)
    "bthserv", # Bluetooth Support Service
    "dmwappushservice", # dmwappushsvc
    "MapsBroker", # Downloaded Maps Manager
    "lfsvc", # Geolocation Service
    "SharedAccess", # Internet Connection Sharing (ICS)
    "lltdsvc", # Link-Layer Topology Discovery Mapper
    "wlidsvc", # Microsoft Account Sign-in Assistant
    "NgcSvc", # Microsoft Passport
    "NgcCtnrSvc", # Microsoft Passport Container
    "NcbService", # Network Connection Broker
    "PhoneSvc", # Phone Service
    "Spooler", # Print Spooler
    "PrintNotify", # Printer Extensions and Notifications
    "PcaSvc", # Program Compatibility Assistant Service
    "QWAVE", # Quality Windows Audio Video Experience
    "RmSvc", # Radio Management Service
    "SensorDataService", # Sensor Data Service
    "SensrSvc", # Sensor Monitoring Service
    "SensorService", # Sensor Service
    "ShellHWDetection", # Shell Hardware Detection
    "ScDeviceEnum", # Smart Card Device Enumeration Service
    "SSDPSRV", # SSDP Discovery
    "WiaRpc", # Still Image Acquisition Events
    "TabletInputService", # Touch Keyboard and Handwriting Panel Service
    "upnphost", # UPnP Device Host
    "WalletService", # WalletService
    "Audiosrv", # Windows Audio
    "AudioEndpointBuilder", # Windows Audio Endpoint Builder
    "FrameServer", # Windows Camera Frame Server
    "stisvc", # Windows Image Acquisition (WIA)
    "wisvc", # Windows Insider Service
    "icssvc", # Windows Mobile Hotspot Service
    "WpnService", # Windows Push Notifications System Service
    "XblAuthManager", # Xbox Live Auth Manager
    "XblGameSave" # Xbox Live Game Save
)

$WindowsUserServices = @(
    "CDPUserSvc", # CDPUserSvc
    "OneSyncSvc", # Sync Host
    "PimIndexMaintenanceSvc", # Contact Data
    "UnistoreSvc", # User Data Storage
    "UserDataSvc", # User Data Access
    "WpnUserService" # Windows Push Notifications User Service
)

Write-Host "========================================" -ForegroundColor Cyan
Write-Host " Disabling Unnecessary Windows Services" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Started at: $(Get-Date)" -ForegroundColor Yellow
Write-Host ""

$SuccessCount = 0
$FailCount = 0

Write-Host "Processing System Services..." -ForegroundColor Cyan
Write-Host ""

ForEach ($Service in $WindowsSystemServices) {
   try {
        Stop-Service -Name "$Service" -Force -ErrorAction Stop
        Set-Service -Name $Service -StartupType Disabled -ErrorAction Stop
        $CheckServiceStatus = (Get-Service -Name $Service)
        if (($CheckServiceStatus.Status -eq "Stopped") -and ($CheckServiceStatus.StartType -eq "Disabled")) {
            Write-Host "[+] Service $($Service) is stopped and disabled" -ForegroundColor Green
            $SuccessCount++
        } elseif (($CheckServiceStatus.Status -eq "Stopped") -and ($CheckServiceStatus.StartType -ne "Disabled")) {
            Write-Host "[-] Service $($Service) is stopped, but not disabled" -ForegroundColor Yellow
            $FailCount++
        } elseif (($CheckServiceStatus.Status -ne "Stopped") -and ($CheckServiceStatus.StartType -ne "Disabled")) {
           Write-Host "[!] Service $($Service) is not stopped and not disabled" -ForegroundColor Red
           $FailCount++
        }        
    } catch {
        Write-Host "[!] Service $($Service) could not be stopped and disabled" -ForegroundColor Red
        $FailCount++
    }
}

Write-Host ""
Write-Host "Processing User Services..." -ForegroundColor Cyan
Write-Host ""

ForEach ($Service in $WindowsUserServices) {
    try {
        Set-ItemProperty -Path "HKLM:\SYSTEM\CurrentControlSet\Services\$Service" -Name "Start" -Value "4" -ErrorAction Stop
        Stop-Service -Name "$Service*" -Force -ErrorAction Stop
        $CheckServiceStatus = (Get-Service -Name "$Service*" -ErrorAction SilentlyContinue)
        if (($CheckServiceStatus.Status -eq "Stopped") -and ($CheckServiceStatus.StartType -eq "Disabled")) {
            Write-Host "[+] Service $($Service) is stopped and disabled" -ForegroundColor Green
            $SuccessCount++
        } elseif (($CheckServiceStatus.Status -eq "Stopped") -and ($CheckServiceStatus.StartType -ne "Disabled")) {
            Write-Host "[-] Service $($Service) is stopped, but not disabled. Reboot required to take effect" -ForegroundColor Yellow
            $SuccessCount++
        } elseif ($null -eq $CheckServiceStatus) {
            Write-Host "[+] Service $($Service) registry disabled. Reboot required to take effect" -ForegroundColor Green
            $SuccessCount++
        } else {
           Write-Host "[!] Service $($Service) is not stopped and not disabled" -ForegroundColor Red
           $FailCount++
        } 
   } catch {
        Write-Host "[!] Service $($Service) could not be stopped and disabled" -ForegroundColor Red
        $FailCount++
   }
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "SUMMARY" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Successful: $SuccessCount" -ForegroundColor Green
Write-Host "  Failed: $FailCount" -ForegroundColor Red
Write-Host "  Completed at: $(Get-Date)" -ForegroundColor Yellow
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "IMPORTANT: A system reboot is recommended for all changes to take effect." -ForegroundColor Yellow
Write-Host ""
Write-Host "Script completed!" -ForegroundColor Green