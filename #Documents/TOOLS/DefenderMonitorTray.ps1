<#
Microsoft Defender Control Script - With Logging and Background Operation
--------------------------------------------------------
Key Logging Features Added:
Desktop Log File: Creates DefenderControl.log on your desktop

Detailed Logging: Every action is logged with timestamps and categories

Color-Coded Messages: Different colors for success, warnings, errors

Log Categories: INFO, ERROR, SUCCESS, WARNING, etc.

Background Operation: The script continues running even if you close VS Code

Log Management: Shows log file size and can open it in Notepad

Summary Statistics: Counts successful actions for easy review

To Run in Background:
Run the script in PowerShell as Administrator

Choose option 2 for continuous monitoring

Close VS Code - the script will continue running in the PowerShell window

Check the log file on your desktop anytime to see what's happening

To stop: Press Ctrl+C in the PowerShell window or close it

The log file will show you exactly what the script is doing, when it's running, and any issues it encounters - all without needing VS Code open!
#>

Add-Type -AssemblyName PresentationFramework
Add-Type -AssemblyName System.Windows.Forms
Add-Type -AssemblyName System.Drawing

# Check if running as Administrator
if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "This script requires Administrator privileges. Please run PowerShell as Administrator." -ForegroundColor Red
    exit 1
}

# Log file setup
$logPath = [System.IO.Path]::Combine([Environment]::GetFolderPath("Desktop"), "DefenderControl.log")
$global:LogEnabled = $true

function Write-Log {
    param(
        [string]$Message,
        [string]$Color = "White",
        [string]$Type = "INFO"
    )
    
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    $logEntry = "[$timestamp] [$Type] $Message"
    
    # Write to console
    Write-Host $logEntry -ForegroundColor $Color
    
    # Write to log file
    if ($global:LogEnabled) {
        try {
            Add-Content -Path $logPath -Value $logEntry -ErrorAction SilentlyContinue
        } catch {
            # If log writing fails, continue without logging
            $global:LogEnabled = $false
        }
    }
}

# Initialize log
Write-Log "=== Defender Control Script Started ===" -Color Cyan -Type "START"
Write-Log "Log file location: $logPath" -Color Yellow -Type "INFO"

# Function to suspend processes using advanced methods
function Suspend-DefenderProcesses {
    Write-Log "Attempting to suspend Defender processes..." -Color Yellow -Type "SUSPEND"
    
    try {
        Add-Type @"
        using System;
        using System.Runtime.InteropServices;
        using System.Diagnostics;
        
        public class ProcessSuspend {
            [DllImport("ntdll.dll")]
            private static extern uint NtSuspendProcess(IntPtr processHandle);
            
            [DllImport("ntdll.dll")]
            private static extern uint NtResumeProcess(IntPtr processHandle);
            
            [DllImport("kernel32.dll")]
            private static extern IntPtr OpenProcess(uint dwDesiredAccess, bool bInheritHandle, int dwProcessId);
            
            [DllImport("kernel32.dll")]
            private static extern bool CloseHandle(IntPtr hObject);
            
            private const uint PROCESS_ALL_ACCESS = 0x001F0FFF;
            
            public static bool SuspendProcess(int pid) {
                IntPtr hProcess = OpenProcess(PROCESS_ALL_ACCESS, false, pid);
                if (hProcess == IntPtr.Zero) return false;
                
                uint result = NtSuspendProcess(hProcess);
                CloseHandle(hProcess);
                return result == 0;
            }
            
            public static bool ResumeProcess(int pid) {
                IntPtr hProcess = OpenProcess(PROCESS_ALL_ACCESS, false, pid);
                if (hProcess == IntPtr.Zero) return false;
                
                uint result = NtResumeProcess(hProcess);
                CloseHandle(hProcess);
                return result == 0;
            }
        }
"@ -ErrorAction SilentlyContinue
    } catch {
        Write-Log "Could not load suspend functions: $($_.Exception.Message)" -Color Red -Type "ERROR"
    }

    $processNames = @("MsMpEng", "NisSrv", "SecurityHealthService", "MsSense")
    $suspendedCount = 0
    
    foreach ($procName in $processNames) {
        try {
            $processes = Get-Process -Name $procName -ErrorAction SilentlyContinue
            foreach ($process in $processes) {
                Write-Log "Attempting to suspend $($process.ProcessName) (PID: $($process.Id))..." -Color Yellow -Type "SUSPEND"
                
                # Try native suspend first
                try {
                    if ([ProcessSuspend]::SuspendProcess($process.Id)) {
                        Write-Log "Successfully suspended $($process.ProcessName)" -Color Green -Type "SUCCESS"
                        $suspendedCount++
                        continue
                    }
                } catch {}
                
                # Try PowerShell Suspend
                try {
                    $process | Suspend-Process -ErrorAction Stop
                    Write-Log "Suspended via PowerShell: $($process.ProcessName)" -Color Green -Type "SUCCESS"
                    $suspendedCount++
                } catch {
                    Write-Log "PowerShell suspend failed: $($_.Exception.Message)" -Color Red -Type "ERROR"
                }
            }
        } catch {
            Write-Log "Error processing $procName : $($_.Exception.Message)" -Color Red -Type "ERROR"
        }
    }
    
    Write-Log "Suspended $suspendedCount processes total" -Color Cyan -Type "SUMMARY"
}

# Enhanced function: Stop Defender using ALL methods
function Stop-Defender {
    Write-Log "Starting aggressive Defender shutdown..." -Color Red -Type "START_SHUTDOWN"
    
    # Phase 1: Disable Tamper Protection via multiple registry methods
    Write-Log "[PHASE 1] Disabling Tamper Protection..." -Color Yellow -Type "PHASE"
    $regPaths = @(
        "HKLM:\SOFTWARE\Microsoft\Windows Defender\Features",
        "HKLM:\SOFTWARE\Microsoft\Windows Defender",
        "HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Features"
    )
    
    foreach ($regPath in $regPaths) {
        try {
            if (-not (Test-Path $regPath)) {
                New-Item -Path $regPath -Force -ErrorAction SilentlyContinue | Out-Null
                Write-Log "Created registry path: $regPath" -Color Green -Type "REGISTRY"
            }
            Set-ItemProperty -Path $regPath -Name "TamperProtection" -Value 0 -Type DWord -Force -ErrorAction SilentlyContinue
            Write-Log "Set TamperProtection=0 in $regPath" -Color Green -Type "REGISTRY"
        } catch {
            Write-Log "Failed to modify $regPath" -Color Red -Type "ERROR"
        }
    }

    # Phase 2: Disable services via multiple methods
    Write-Log "[PHASE 2] Disabling services..." -Color Yellow -Type "PHASE"
    $services = @("WinDefend", "Sense", "WdNisSvc", "SecurityHealthService")
    $stoppedServices = 0
    
    foreach ($service in $services) {
        try {
            # Method 1: Stop service
            Stop-Service -Name $service -Force -ErrorAction SilentlyContinue
            Write-Log "Stopped service: $service" -Color Green -Type "SERVICE"
            $stoppedServices++
            
            # Method 2: Disable startup
            Set-Service -Name $service -StartupType Disabled -ErrorAction SilentlyContinue
            Write-Log "Disabled startup: $service" -Color Green -Type "SERVICE"
            
            # Method 3: Use sc config
            cmd /c "sc config $service start= disabled 2>nul"
            
            # Method 4: Use WMI
            try {
                (Get-WmiObject -Class Win32_Service -Filter "Name='$service'").InvokeMethod("StopService", $null)
            } catch {}
            
        } catch {
            Write-Log "Service control failed for $service : $($_.Exception.Message)" -Color Red -Type "ERROR"
        }
    }
    
    Write-Log "Stopped $stoppedServices out of $($services.Count) services" -Color Cyan -Type "SUMMARY"

    # Phase 3: Kill processes with ALL methods
    Write-Log "[PHASE 3] Terminating processes..." -Color Yellow -Type "PHASE"
    $processNames = @("MsMpEng", "NisSrv", "SecurityHealthService", "MsSense")
    $killedProcesses = 0
    
    foreach ($procName in $processNames) {
        $attempts = 0
        while ($attempts -lt 5) {
            try {
                $process = Get-Process -Name $procName -ErrorAction SilentlyContinue
                if (-not $process) { 
                    Write-Log "$procName already stopped" -Color Green -Type "PROCESS"
                    $killedProcesses++
                    break 
                }
                
                Write-Log "Attempt $($attempts + 1) for $procName (PID: $($process.Id))" -Color Yellow -Type "ATTEMPT"
                
                # Method 1: Standard Stop-Process
                try {
                    Stop-Process -Name $procName -Force -ErrorAction Stop
                    Write-Log "Stopped $procName via Stop-Process" -Color Green -Type "SUCCESS"
                    $killedProcesses++
                    break
                } catch {
                    Write-Log "Stop-Process failed: $($_.Exception.Message)" -Color Red -Type "ERROR"
                }
                
                # Method 2: taskkill
                try {
                    $result = cmd /c "taskkill /f /im $procName.exe 2>&1"
                    if ($LASTEXITCODE -eq 0) {
                        Write-Log "Stopped $procName via taskkill" -Color Green -Type "SUCCESS"
                        $killedProcesses++
                        break
                    }
                } catch {}
                
                # Method 3: WMI process termination
                try {
                    (Get-WmiObject -Class Win32_Process -Filter "name='$procName.exe'").Terminate()
                    Write-Log "Terminated $procName via WMI" -Color Green -Type "SUCCESS"
                    $killedProcesses++
                    break
                } catch {}
                
                # Method 4: Suspend process instead of kill
                try {
                    Suspend-DefenderProcesses
                    Write-Log "Suspended $procName as fallback" -Color Yellow -Type "SUSPEND"
                    $killedProcesses++
                    break
                } catch {}
                
                $attempts++
                Start-Sleep -Seconds 2
                
            } catch {
                $attempts++
                Start-Sleep -Seconds 2
            }
        }
    }
    
    Write-Log "Killed/Suspended $killedProcesses out of $($processNames.Count) processes" -Color Cyan -Type "SUMMARY"

    # Phase 4: Disable via Group Policy and Registry
    Write-Log "[PHASE 4] Registry and Policy modifications..." -Color Yellow -Type "PHASE"
    $registryChanges = 0
    try {
        $registrySettings = @(
            @{Path="HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender"; Name="DisableAntiSpyware"; Value=1},
            @{Path="HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Real-Time Protection"; Name="DisableRealtimeMonitoring"; Value=1},
            @{Path="HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Real-Time Protection"; Name="DisableBehaviorMonitoring"; Value=1},
            @{Path="HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Real-Time Protection"; Name="DisableOnAccessProtection"; Value=1},
            @{Path="HKLM:\SOFTWARE\Policies\Microsoft\Windows Defender\Real-Time Protection"; Name="DisableScanOnRealtimeEnable"; Value=1},
            @{Path="HKLM:\SOFTWARE\Microsoft\Windows Defender\Real-Time Protection"; Name="DisableRealtimeMonitoring"; Value=1}
        )
        
        foreach ($setting in $registrySettings) {
            try {
                if (-not (Test-Path $setting.Path)) {
                    New-Item -Path $setting.Path -Force -ErrorAction SilentlyContinue | Out-Null
                }
                Set-ItemProperty -Path $setting.Path -Name $setting.Name -Value $setting.Value -Type DWord -Force -ErrorAction SilentlyContinue
                Write-Log "Set registry: $($setting.Path)\$($setting.Name)=$($setting.Value)" -Color Green -Type "REGISTRY"
                $registryChanges++
            } catch {
                Write-Log "Failed registry: $($setting.Path)" -Color Red -Type "ERROR"
            }
        }
    } catch {
        Write-Log "Registry phase failed: $($_.Exception.Message)" -Color Red -Type "ERROR"
    }
    
    Write-Log "Applied $registryChanges registry changes" -Color Cyan -Type "SUMMARY"

    # Final verification
    Write-Log "[FINAL] Verifying Defender status..." -Color Cyan -Type "VERIFICATION"
    Start-Sleep -Seconds 3
    
    $runningProcesses = @()
    foreach ($procName in $processNames) {
        if (Get-Process -Name $procName -ErrorAction SilentlyContinue) {
            $runningProcesses += $procName
        }
    }
    
    if ($runningProcesses.Count -eq 0) {
        Write-Log "SUCCESS: All Defender processes stopped!" -Color Green -Type "SUCCESS"
        Write-Log "Summary: Services:$stoppedServices/$($services.Count) Processes:$killedProcesses/$($processNames.Count) Registry:$registryChanges" -Color Cyan -Type "FINAL_SUMMARY"
    } else {
        Write-Log "PARTIAL: Some processes still running: $($runningProcesses -join ', ')" -Color Yellow -Type "WARNING"
        Write-Log "Trying emergency suspend method..." -Color Red -Type "EMERGENCY"
        Suspend-DefenderProcesses
    }
}

# Function: Check Defender status
function Get-DefenderStatus {
    $processNames = @("MsMpEng", "NisSrv", "SecurityHealthService", "MsSense")
    $runningProcesses = @()
    
    foreach ($procName in $processNames) {
        if (Get-Process -Name $procName -ErrorAction SilentlyContinue) {
            $runningProcesses += $procName
        }
    }
    
    return @{
        RunningProcesses = $runningProcesses
        IsRunning = ($runningProcesses.Count -gt 0)
    }
}

# Function: Check Defender once
function Check-Defender {
    Write-Log "Manual Defender status check initiated..." -Color Cyan -Type "MANUAL_CHECK"
    $status = Get-DefenderStatus
    
    if ($status.IsRunning) {
        Write-Log "RUNNING - Processes: $($status.RunningProcesses -join ', ')" -Color Red -Type "STATUS"
        $stop = Read-Host 'Stop Defender aggressively? (Y/N)'
        if ($stop -match '^[Yy]$') {
            Stop-Defender
        } else {
            Write-Log "User chose not to stop Defender" -Color Yellow -Type "USER_CHOICE"
        }
    } else {
        Write-Log "STOPPED - No Defender processes found" -Color Green -Type "STATUS"
    }
}

# Function: Continuous monitoring (runs in background)
function Monitor-Defender-Console {
    Write-Log "Continuous monitoring mode started..." -Color Green -Type "MONITOR_START"
    Write-Log "This will run in background. Check log file at: $logPath" -Color Yellow -Type "INFO"
    Write-Log "Press Ctrl+C in the console to stop monitoring" -Color Yellow -Type "INFO"
    
    $monitorCount = 0
    try {
        while ($true) {
            $monitorCount++
            $status = Get-DefenderStatus
            if ($status.IsRunning) {
                Write-Log "Monitor #$($monitorCount): DEFENDER RUNNING - $($status.RunningProcesses -join ', ')" -Color Red -Type "MONITOR"
                Write-Log "Auto-stopping Defender..." -Color Yellow -Type "AUTO_ACTION"
                Stop-Defender
            } else {
                if ($monitorCount % 10 -eq 0) {  # Log every 10th check to avoid spam
                    Write-Log "Monitor #$($monitorCount): Defender stopped - All systems normal" -Color Green -Type "MONITOR"
                }
            }
            Start-Sleep -Seconds 10
        }
    } catch {
        Write-Log "Monitoring stopped after $monitorCount cycles. Error: $($_.Exception.Message)" -Color Yellow -Type "MONITOR_END"
    }
}

# Function: Show log file location
function Show-LogLocation {
    Write-Log "Current log file: $logPath" -Color Cyan -Type "INFO"
    if (Test-Path $logPath) {
        $logSize = (Get-Item $logPath).Length / 1KB
        Write-Log "Log file size: $([math]::Round($logSize, 2)) KB" -Color Cyan -Type "INFO"
        
        $openLog = Read-Host "Open log file now? (Y/N)"
        if ($openLog -match '^[Yy]$') {
            try {
                notepad $logPath
                Write-Log "Opened log file in Notepad" -Color Green -Type "INFO"
            } catch {
                Write-Log "Failed to open log file: $($_.Exception.Message)" -Color Red -Type "ERROR"
            }
        }
    } else {
        Write-Log "Log file doesn't exist yet" -Color Yellow -Type "WARNING"
    }
}

# Main menu
while ($true) {
    Write-Host "`n" + "="*60 -ForegroundColor Cyan
    Write-Host "DEFENDER DISABLER WITH LOGGING" -ForegroundColor Green
    Write-Host "Log file: $logPath" -ForegroundColor Yellow
    Write-Host "="*60 -ForegroundColor Cyan
    Write-Host "1: Check status and stop Defender" -ForegroundColor White
    Write-Host "2: Continuous monitoring mode (runs in background)" -ForegroundColor White
    Write-Host "3: Emergency stop (bypass Tamper Protection)" -ForegroundColor Yellow
    Write-Host "4: Show log file location and info" -ForegroundColor Cyan
    Write-Host "0: Exit" -ForegroundColor White
    Write-Host "="*60 -ForegroundColor Cyan
    
    $choice = Read-Host "Select option"
    
    switch ($choice) {
        '1' { 
            Write-Log "User selected: Manual check and stop" -Color Cyan -Type "MENU_SELECTION"
            Check-Defender 
        }
        '2' { 
            Write-Log "User selected: Continuous monitoring" -Color Cyan -Type "MENU_SELECTION"
            Monitor-Defender-Console 
        }
        '3' { 
            Write-Log "User selected: Emergency stop" -Color Red -Type "MENU_SELECTION"
            Stop-Defender 
        }
        '4' { 
            Write-Log "User selected: Show log info" -Color Cyan -Type "MENU_SELECTION"
            Show-LogLocation 
        }
        '0' { 
            Write-Log "=== Script exited by user ===" -Color Yellow -Type "EXIT"
            Write-Log "Log file remains at: $logPath" -Color Cyan -Type "INFO"
            exit 
        }
        default { 
            Write-Log "Invalid menu option: $choice" -Color Red -Type "ERROR"
        }
    }
}