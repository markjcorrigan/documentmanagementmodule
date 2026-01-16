@echo off
echo ============================================
echo Laravel Scheduler Setup
echo ============================================
echo.
echo This will configure Windows Task Scheduler to run
echo the Laravel scheduler every minute.
echo.
pause

REM Delete existing task if it exists
schtasks /Delete /TN "Laravel Scheduler" /F 2>nul

REM Create new task
schtasks /Create /TN "Laravel Scheduler" /TR "C:\xampp\htdocs\pmway.hopto.org\run-scheduler.bat" /SC MINUTE /MO 1 /RU "SYSTEM" /RL HIGHEST /F

if %ERRORLEVEL% EQU 0 (
    echo.
    echo ✓ Task successfully created!
    echo.
    echo The Laravel scheduler will now run every minute.
    echo.
    echo Backup Schedule:
    echo   - Daily:   Every day at 2:30 AM
    echo   - Weekly:  Every Sunday at 4:00 AM  
    echo   - Monthly: 1st of month at 5:00 AM
    echo.
) else (
    echo.
    echo ✗ Failed! Run this file as Administrator.
    echo.
)

pause