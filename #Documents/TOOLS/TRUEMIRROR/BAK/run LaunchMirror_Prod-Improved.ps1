<#
=============================================================
TrueMirror Launcher Script
=============================================================
Purpose: Bypass Windows 11 25H5+ execution policy for the main mirror script.
How to use:
1. Right-click this file
2. Select "Run with PowerShell 7"
#>

# 1. BYPASS THE EXECUTION POLICY FOR THIS SESSION
Write-Host "Setting Execution Policy to Bypass for this session..." -ForegroundColor Yellow
Set-ExecutionPolicy Bypass -Scope Process -Force

# 2. CALCULATE THE PATH TO THE MAIN SCRIPT
#    This assumes the launcher is in the SAME FOLDER as TRUEMIRROR_PROD.ps1
$ScriptDirectory = Split-Path -Parent $MyInvocation.MyCommand.Path
$MainScriptPath = Join-Path $ScriptDirectory "TRUEMIRROR_PROD.ps1"

# 3. VERIFY THE MAIN SCRIPT EXISTS
if (Test-Path $MainScriptPath) {
    Write-Host "`nFound main script: $MainScriptPath" -ForegroundColor Green
    Write-Host "Starting Enhanced Mirror Script..." -ForegroundColor Cyan
    Write-Host ("=" * 60) -ForegroundColor Cyan
    
    # 4. RUN THE ORIGINAL, UNMODIFIED SCRIPT
    & $MainScriptPath
    
} else {
    Write-Host "`nERROR: Could not find the main script!" -ForegroundColor Red
    Write-Host "Expected it at: $MainScriptPath" -ForegroundColor Red
    Write-Host "`nPlease ensure this launcher is in the same folder as 'TRUEMIRROR_PROD-Improved.ps1'." -ForegroundColor Yellow
}

# 5. PAUSE BEFORE EXITING
Write-Host "`nLauncher script finished." -ForegroundColor Gray
Read-Host "Press Enter to close this window"