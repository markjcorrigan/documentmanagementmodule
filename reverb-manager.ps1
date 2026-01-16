# Laravel Reverb Manager - Fixed Process Detection
# Save as reverb-manager.ps1

# Colors for output
$Green = "Green"
$Red = "Red" 
$Yellow = "Yellow"
$Cyan = "Cyan"
$Magenta = "Magenta"
$Gray = "Gray"

# Global variable for project path
$ProjectPath = ""

function Write-ColorOutput {
    param([string]$Message, [string]$Color = "White")
    if ([string]::IsNullOrWhiteSpace($Color)) {
        $Color = "White"
    }
    Write-Host $Message -ForegroundColor $Color
}

function Get-ProjectPath {
    $currentDir = Get-Location
    Write-ColorOutput "`nCurrent directory: $currentDir" $Yellow
    
    if (Test-Path "$currentDir\artisan") {
        Write-ColorOutput "✅ Laravel project found in current directory!" $Green
        return $currentDir
    }
    
    Write-ColorOutput "❌ Laravel project not found in current directory" $Red
    Write-ColorOutput "`nPlease enter your Laravel project path:" $Cyan
    Write-ColorOutput "Example: C:\xampp\htdocs\my-project" $Yellow
    
    $path = Read-Host "`nProject path"
    
    if (-not $path) {
        $path = $currentDir
    }
    
    if (-not (Test-Path "$path\artisan")) {
        Write-ColorOutput "❌ Laravel project not found at: $path" $Red
        return $null
    }
    
    Write-ColorOutput "✅ Laravel project found at: $path" $Green
    return $path
}

function Set-ProjectLocation {
    param([string]$Path)
    
    if (-not (Test-Path "$Path\artisan")) {
        Write-ColorOutput "❌ Cannot set location: Artisan file not found at $Path" $Red
        return $false
    }
    
    try {
        Set-Location $Path
        return $true
    }
    catch {
        Write-ColorOutput "❌ Error setting location: $($_.Exception.Message)" $Red
        return $false
    }
}

function Show-Header {
    Clear-Host
    Write-ColorOutput "`n" $Cyan
    Write-ColorOutput "╔══════════════════════════════════════╗" $Cyan
    Write-ColorOutput "║        LARAVEL REVERB MANAGER       ║" $Cyan
    Write-ColorOutput "║            Interactive Menu          ║" $Cyan
    Write-ColorOutput "╚══════════════════════════════════════╝" $Cyan
    
    if ($ProjectPath) {
        Write-ColorOutput "`n📁 Project: $ProjectPath" $Green
    }
    Write-ColorOutput "`n" $Cyan
}

function Wait-ForKey {
    Write-Host "`nPress any key to continue..." -NoNewline
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
    Write-Host ""
}

function Test-Port {
    param([int]$Port)
    try {
        $tcp = New-Object System.Net.Sockets.TcpClient
        $result = $tcp.BeginConnect("127.0.0.1", $Port, $null, $null)
        $success = $result.AsyncWaitHandle.WaitOne(1000)
        $tcp.Close()
        return $success
    } catch {
        return $false
    }
}

function Get-ReverbProcess {
    # Get all PHP processes and filter for Reverb
    $processes = Get-Process php -ErrorAction SilentlyContinue | Where-Object { 
        $_.ProcessName -eq "php" -and $_.CommandLine -like "*artisan*" -and $_.CommandLine -like "*reverb*"
    }
    return $processes
}

function Get-ReverbStatus {
    Write-ColorOutput "`n🔍 Checking Reverb Status..." $Cyan
    
    if (-not (Set-ProjectLocation $ProjectPath)) {
        Wait-ForKey
        return
    }
    
    # Check processes using our improved function
    $process = Get-ReverbProcess
    
    # Check multiple ports
    $port8080 = Test-Port -Port 8080
    $port6001 = Test-Port -Port 6001
    
    Write-ColorOutput "`n=== REVERB STATUS ===" $Cyan
    
    # Process status
    Write-Host "Process running: " -NoNewline
    if ($process) { 
        Write-ColorOutput "YES ✅" $Green
        $process | ForEach-Object {
            Write-Host "    PID: $($_.Id)" -ForegroundColor $Yellow
        }
    } else { 
        Write-ColorOutput "NO ❌" $Red 
    }
    
    # Port status
    Write-ColorOutput "`nPort Check Results:" $Yellow
    Write-Host "  Port 8080: " -NoNewline
    if ($port8080) { Write-ColorOutput "OPEN ✅" $Green } else { Write-ColorOutput "CLOSED ❌" $Red }
    
    Write-Host "  Port 6001: " -NoNewline
    if ($port6001) { Write-ColorOutput "OPEN ✅" $Green } else { Write-ColorOutput "CLOSED ❌" $Red }
    
    # Check job status
    $job = Get-Job -Name "LaravelReverb" -ErrorAction SilentlyContinue
    Write-Host "Background job: " -NoNewline
    if ($job) { 
        Write-ColorOutput "RUNNING ✅" $Green 
        Write-Host "    Job ID: $($job.Id)" -ForegroundColor $Yellow
        Write-Host "    Job State: $($job.State)" -ForegroundColor $Yellow
    } else { 
        Write-ColorOutput "NOT FOUND ❌" $Red 
    }
    
    # Check log for specific messages
    if (Test-Path "reverb.log") {
        $logContent = Get-Content "reverb.log" -Tail 5 -ErrorAction SilentlyContinue
        Write-ColorOutput "`nRecent log messages:" $Yellow
        foreach ($line in $logContent) {
            if ($line -match "starting|running") {
                Write-Host "  ✅ $line" -ForegroundColor $Green
            } elseif ($line -match "error|failed") {
                Write-Host "  ❌ $line" -ForegroundColor $Red
            } else {
                Write-Host "  ℹ️  $line" -ForegroundColor $Yellow
            }
        }
    }
    
    # Overall status
    if (($process -or $job) -and $port8080) {
        Write-ColorOutput "`n🎉 Reverb is running successfully on port 8080!" $Green
        Write-ColorOutput "   You can connect via: ws://localhost:8080" $Green
    } elseif (($process -or $job) -and -not $port8080) {
        Write-ColorOutput "`n⚠️  Reverb is running but port 8080 is not accessible" $Yellow
        Write-ColorOutput "   This might be a firewall or binding issue" $Yellow
    } else {
        Write-ColorOutput "`n❌ Reverb is not running" $Red
    }
    
    Wait-ForKey
}

function Start-Reverb {
    Write-ColorOutput "`n🚀 Starting Laravel Reverb..." $Cyan
    
    if (-not (Set-ProjectLocation $ProjectPath)) {
        Wait-ForKey
        return
    }
    
    # Stop any existing processes first
    $existingProcess = Get-ReverbProcess
    $existingJob = Get-Job -Name "LaravelReverb" -ErrorAction SilentlyContinue
    
    if ($existingProcess) {
        Write-ColorOutput "⚠️  Stopping existing Reverb process..." $Yellow
        $existingProcess | ForEach-Object {
            Write-ColorOutput "   Stopping PID: $($_.Id)" $Yellow
            Stop-Process -Id $_.Id -Force
        }
        Start-Sleep -Seconds 2
    }
    
    if ($existingJob) {
        Write-ColorOutput "⚠️  Removing existing background job..." $Yellow
        $existingJob | Remove-Job -Force
    }
    
    Write-ColorOutput "📝 Starting Reverb process..." $Yellow
    
    # Start Reverb in background with logging
    $scriptBlock = {
        param($Path)
        Set-Location $Path
        php artisan reverb:start *> "reverb.log"
    }
    
    $job = Start-Job -ScriptBlock $scriptBlock -ArgumentList $ProjectPath -Name "LaravelReverb"
    
    Write-ColorOutput "✅ Background job started (ID: $($job.Id))" $Green
    Write-ColorOutput "⏳ Waiting for Reverb to start (10 seconds)..." $Yellow
    
    # Wait longer and check multiple times
    for ($i = 1; $i -le 10; $i++) {
        Write-Host "." -NoNewline -ForegroundColor $Yellow
        Start-Sleep -Seconds 1
        
        # Check if port is open (this is the real test)
        $port8080 = Test-Port -Port 8080
        if ($port8080) {
            Write-Host "✅" -ForegroundColor $Green
            Write-ColorOutput "`n🎉 Port 8080 is now open! Reverb is running." $Green
            break
        }
    }
    
    Write-Host ""
    
    # Final status check
    $process = Get-ReverbProcess
    $port8080 = Test-Port -Port 8080
    $job = Get-Job -Name "LaravelReverb" -ErrorAction SilentlyContinue
    
    Write-ColorOutput "`n=== STARTUP RESULTS ===" $Cyan
    Write-Host "Background job: " -NoNewline
    if ($job) { 
        Write-ColorOutput "RUNNING ✅" $Green 
        Write-Host "    Job State: $($job.State)" -ForegroundColor $Yellow
    } else { 
        Write-ColorOutput "NOT FOUND ❌" $Red 
    }
    
    Write-Host "PHP process: " -NoNewline
    if ($process) { 
        Write-ColorOutput "RUNNING ✅" $Green 
        $process | ForEach-Object {
            Write-Host "    PID: $($_.Id)" -ForegroundColor $Yellow
        }
    } else { 
        Write-ColorOutput "NOT FOUND ❌" $Red 
    }
    
    Write-Host "Port 8080: " -NoNewline
    if ($port8080) { 
        Write-ColorOutput "OPEN ✅" $Green
        Write-ColorOutput "`n🌐 WebSocket server is ready at: ws://localhost:8080" $Green
    } else { 
        Write-ColorOutput "CLOSED ❌" $Red
        Write-ColorOutput "`n⚠️  Port 8080 is not accessible. The server may still be starting." $Yellow
    }
    
    # Show recent log
    if (Test-Path "reverb.log") {
        Write-ColorOutput "`nRecent log output:" $Cyan
        Get-Content "reverb.log" -Tail 5 | ForEach-Object { Write-Host "  $_" -ForegroundColor $Yellow }
    }
    
    Wait-ForKey
}

function Stop-Reverb {
    Write-ColorOutput "`n🛑 Stopping Laravel Reverb..." $Cyan
    
    # Stop processes
    $processes = Get-ReverbProcess
    if ($processes) {
        $processCount = $processes.Count
        $processes | ForEach-Object {
            Write-ColorOutput "Stopping process PID: $($_.Id)..." $Yellow
            Stop-Process -Id $_.Id -Force
        }
        Write-ColorOutput "✅ $processCount Reverb process(es) stopped" $Green
    } else {
        Write-ColorOutput "ℹ️  No running Reverb processes found" $Yellow
    }
    
    # Stop jobs
    $jobs = Get-Job -Name "LaravelReverb" -ErrorAction SilentlyContinue
    if ($jobs) {
        $jobs | Remove-Job -Force
        Write-ColorOutput "✅ Background job(s) removed" $Green
    }
    
    Wait-ForKey
}

function Show-Log {
    Write-ColorOutput "`n📄 Showing Reverb Log..." $Cyan
    
    if (-not (Set-ProjectLocation $ProjectPath)) {
        Wait-ForKey
        return
    }
    
    if (Test-Path "reverb.log") {
        Write-ColorOutput "Last 20 lines of reverb.log:" $Yellow
        Write-Host "─" * 60 -ForegroundColor $Cyan
        $logContent = Get-Content "reverb.log" -Tail 20
        foreach ($line in $logContent) {
            if ($line -match "ERROR|error|failed|exception") {
                Write-Host "  ❌ $line" -ForegroundColor $Red
            } elseif ($line -match "WARNING|warning") {
                Write-Host "  ⚠️  $line" -ForegroundColor $Yellow
            } elseif ($line -match "INFO|info|starting|running") {
                Write-Host "  ✅ $line" -ForegroundColor $Green
            } else {
                Write-Host "  ℹ️  $line" -ForegroundColor $Gray
            }
        }
        Write-Host "─" * 60 -ForegroundColor $Cyan
        Write-ColorOutput "Full log file: $ProjectPath\reverb.log" $Yellow
    } else {
        Write-ColorOutput "❌ Log file not found: $ProjectPath\reverb.log" $Red
    }
    
    Wait-ForKey
}

function Test-Connection {
    Write-ColorOutput "`n🔌 Testing WebSocket Connection..." $Cyan
    
    if (-not (Set-ProjectLocation $ProjectPath)) {
        Wait-ForKey
        return
    }
    
    Write-ColorOutput "Testing connection to Reverb server..." $Yellow
    
    # Check if process is running
    $process = Get-ReverbProcess
    if ($process) {
        Write-ColorOutput "✅ Reverb process is running" $Green
        $process | ForEach-Object {
            Write-Host "    PID: $($_.Id)" -ForegroundColor $Yellow
        }
    } else {
        Write-ColorOutput "❌ No Reverb process found" $Red
    }
    
    # Check job status
    $job = Get-Job -Name "LaravelReverb" -ErrorAction SilentlyContinue
    if ($job) {
        Write-ColorOutput "✅ Background job is running (ID: $($job.Id))" $Green
        Write-Host "    Job State: $($job.State)" -ForegroundColor $Yellow
    }
    
    # Test port
    $port8080 = Test-Port -Port 8080
    Write-Host "Port 8080 accessible: " -NoNewline
    if ($port8080) { 
        Write-ColorOutput "YES ✅" $Green 
        Write-ColorOutput "🌐 WebSocket should be available at: ws://localhost:8080" $Green
    } else { 
        Write-ColorOutput "NO ❌" $Red 
        Write-ColorOutput "⚠️  Port 8080 is not accessible" $Yellow
    }
    
    Wait-ForKey
}

function Show-Menu {
    Show-Header
    
    if ($ProjectPath) {
        Write-ColorOutput "Artisan File: $(if (Test-Path "$ProjectPath\artisan") { "Found ✅" } else { "Not Found ❌" })" $Yellow
    }
    
    Write-ColorOutput "`nPlease choose an option:" $Cyan
    Write-Host "`n"
    Write-ColorOutput " 1. 🚀 Start Reverb" $Green
    Write-ColorOutput " 2. 🛑 Stop Reverb" $Red  
    Write-ColorOutput " 3. 🔄 Restart Reverb" $Yellow
    Write-ColorOutput " 4. 🔍 Check Status" $Cyan
    Write-ColorOutput " 5. 📄 Show Log" $Magenta
    Write-ColorOutput " 6. 🔌 Test Connection" $Cyan
    Write-ColorOutput " 7. 📁 Change Project Path" $Yellow
    Write-Host "`n"
    Write-ColorOutput " 0. ❌ Exit" $Red
    Write-Host "`n"
}

# Initialize project path
$ProjectPath = Get-ProjectPath
if (-not $ProjectPath) {
    Write-ColorOutput "❌ No valid Laravel project found. Exiting." $Red
    Wait-ForKey
    exit
}

# Main program
do {
    try {
        Show-Menu
        $choice = Read-Host "Enter your choice (0-7)"
        
        switch ($choice) {
            "1" { Start-Reverb }
            "2" { Stop-Reverb }
            "3" { 
                Stop-Reverb
                Start-Sleep -Seconds 2
                Start-Reverb
            }
            "4" { Get-ReverbStatus }
            "5" { Show-Log }
            "6" { Test-Connection }
            "7" { 
                $newPath = Get-ProjectPath
                if ($newPath) { $ProjectPath = $newPath }
            }
            "0" { 
                Write-ColorOutput "`n👋 Goodbye!" $Cyan
                Get-Job -Name "LaravelReverb" -ErrorAction SilentlyContinue | Remove-Job -Force
                exit 
            }
            default { 
                Write-ColorOutput "`n❌ Invalid choice! Please enter 0-7" $Red
                Start-Sleep -Seconds 2
            }
        }
    }
    catch {
        Write-ColorOutput "`n❌ An error occurred: $($_.Exception.Message)" $Red
        Wait-ForKey
    }
} while ($true)