@echo off
REM ==========================================
REM Universal PowerShell Script Launcher (ADMIN)
REM ==========================================
REM Bypasses execution policy and signature checks
REM Supports Windows 11 25H2 restrictions
REM
REM USAGE:
REM   1. Drag and drop any .ps1 file onto this .bat file
REM   2. Run from command line: RunPS1_Admin.bat "C:\path\to\script.ps1" [args]
REM   3. Double-click and it will ask for the script path
REM ==========================================

setlocal enabledelayedexpansion

REM Check for admin privileges
net session >nul 2>&1
if %errorLevel% NEQ 0 (
    REM Not admin - request elevation
    echo Requesting Administrator privileges...
    
    REM Preserve all arguments
    if "%~1"=="" (
        powershell -Command "Start-Process '%~f0' -Verb RunAs"
    ) else (
        REM Rebuild argument list
        set "ARGS="
        :build_args
        if not "%~1"=="" (
            set "ARGS=!ARGS! '%~1'"
            shift
            goto :build_args
        )
        powershell -Command "Start-Process '%~f0' -ArgumentList !ARGS! -Verb RunAs"
    )
    exit
)

REM Running as admin - proceed
echo.
echo ==========================================
echo  Universal PowerShell Launcher (ADMIN)
echo ==========================================
echo Running as Administrator
echo Windows Version: Windows 11 25H2 Compatible
echo ==========================================
echo.

REM Check if a script was passed as argument
if "%~1"=="" goto :prompt_for_script

REM Script was provided as argument
set "PS1_SCRIPT=%~1"
shift

REM Collect remaining arguments for the PowerShell script
set "PS_ARGS="
:collect_args
if not "%~1"=="" (
    set "PS_ARGS=!PS_ARGS! '%~1'"
    shift
    goto :collect_args
)

goto :validate_script

:prompt_for_script
REM No argument provided - ask user for script path
echo No script provided. 
echo.
set /p "PS1_SCRIPT=Enter the full path to your .ps1 script: "
echo.
set "PS_ARGS="

:validate_script
REM Check if file exists
if not exist "%PS1_SCRIPT%" (
    echo [ERROR] Script not found!
    echo Path: %PS1_SCRIPT%
    echo.
    pause
    exit /b 1
)

REM Check if it's a .ps1 file
if /i not "%PS1_SCRIPT:~-4%"==".ps1" (
    echo [ERROR] This is not a PowerShell script (.ps1 file^)
    echo File: %PS1_SCRIPT%
    echo.
    pause
    exit /b 1
)

echo [OK] Script found: %PS1_SCRIPT%
if not "!PS_ARGS!"=="" (
    echo [OK] Arguments:!PS_ARGS!
)
echo.
echo Launching with all restrictions bypassed...
echo.

REM Method 1: Try with full bypass (works for most cases including 25H2)
echo [Attempt 1] Using ExecutionPolicy Bypass...
PowerShell.exe -NoProfile -ExecutionPolicy Bypass -NoLogo -NonInteractive -Command "& {Set-ExecutionPolicy -Scope Process -ExecutionPolicy Bypass -Force; & '%PS1_SCRIPT%' !PS_ARGS!}"

REM Check if successful
if %ERRORLEVEL% EQU 0 goto :success

REM Method 2: If that fails, try with Unrestricted
echo.
echo [Attempt 2] Method 1 failed, trying ExecutionPolicy Unrestricted...
PowerShell.exe -NoProfile -ExecutionPolicy Unrestricted -NoLogo -Command "& {Set-ExecutionPolicy -Scope Process -ExecutionPolicy Unrestricted -Force; & '%PS1_SCRIPT%' !PS_ARGS!}"

REM Check if successful
if %ERRORLEVEL% EQU 0 goto :success

REM Method 3: Last resort - read and execute content directly
echo.
echo [Attempt 3] Previous methods failed, executing content directly...
PowerShell.exe -NoProfile -ExecutionPolicy Bypass -Command "$content = Get-Content -Path '%PS1_SCRIPT%' -Raw; Invoke-Expression $content"

if %ERRORLEVEL% EQU 0 goto :success

REM All methods failed
echo.
echo ==========================================
echo [FAILED] All execution methods failed
echo ==========================================
echo Error Code: %ERRORLEVEL%
echo.
echo Possible solutions:
echo 1. Check if the script has syntax errors
echo 2. Verify the script path is correct
echo 3. Try running PowerShell as admin manually
echo 4. Check Windows Defender or antivirus logs
echo ==========================================
echo.
pause
exit /b %ERRORLEVEL%

:success
echo.
echo ==========================================
echo [SUCCESS] Script completed successfully
echo ==========================================
echo.
pause
exit /b 0