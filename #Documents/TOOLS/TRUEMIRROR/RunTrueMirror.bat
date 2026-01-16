@echo off
REM ==========================================
REM TRUEMIRROR PowerShell Launcher
REM ==========================================
REM Simple double-click launcher for the mirror script
REM No admin rights required!
REM ==========================================

setlocal enabledelayedexpansion

echo.
echo ==========================================
echo  TRUEMIRROR PowerShell Launcher
echo ==========================================
echo.

REM Get the directory where this batch file is located
set "SCRIPT_DIR=%~dp0"

REM Remove trailing backslash if present
if "%SCRIPT_DIR:~-1%"=="\" set "SCRIPT_DIR=%SCRIPT_DIR:~0,-1%"

REM Define the PowerShell script name
set "PS1_SCRIPT=%SCRIPT_DIR%\TRUEMIRROR_PROD-Improved-2D.ps1"

REM Check if the script exists
if not exist "%PS1_SCRIPT%" (
    echo [ERROR] PowerShell script not found!
    echo Expected location: %PS1_SCRIPT%
    echo.
    echo Please ensure TRUEMIRROR_PROD-Improved-2D.ps1 is in the same folder as this batch file.
    echo.
    pause
    exit /b 1
)

echo [OK] Found script: %PS1_SCRIPT%
echo.
echo Launching PowerShell script...
echo Note: This script does NOT require administrator rights.
echo.

REM Launch PowerShell with execution policy bypass
REM Using -NoExit so you can see any errors
PowerShell.exe -NoProfile -ExecutionPolicy Bypass -NoLogo -File "%PS1_SCRIPT%"

REM Check exit code
if %ERRORLEVEL% EQU 0 (
    echo.
    echo ==========================================
    echo [SUCCESS] Script completed
    echo ==========================================
) else (
    echo.
    echo ==========================================
    echo [ERROR] Script failed with code %ERRORLEVEL%
    echo ==========================================
)

echo.
pause
