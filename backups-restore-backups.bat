@echo off
setlocal enabledelayedexpansion

echo ============================================
echo Database Restore Utility
echo ============================================
echo.

cd /d C:\xampp\htdocs\pmway.hopto.org

REM Load database name from .env
for /f "tokens=2 delims==" %%a in ('findstr /B "DB_DATABASE=" .env') do set DB_DATABASE=%%a
for /f "tokens=2 delims==" %%a in ('findstr /B "DB_USERNAME=" .env') do set DB_USERNAME=%%a
for /f "tokens=2 delims==" %%a in ('findstr /B "DB_PASSWORD=" .env') do set DB_PASSWORD=%%a

echo Current Database: %DB_DATABASE%
echo.
echo ============================================
echo Available Backups
echo ============================================
echo.

echo DAILY BACKUPS (Last 7 days):
echo -------------------------------------------
set /a count=0
for /f "delims=" %%f in ('dir /b /o-d storage\app\backups\daily\*.sql 2^>nul') do (
    set /a count+=1
    echo !count!. %%f
)
if !count!==0 echo   No daily backups found
echo.

echo WEEKLY BACKUPS (Last 4 weeks):
echo -------------------------------------------
set /a count=0
for /f "delims=" %%f in ('dir /b /o-d storage\app\backups\weekly\*.sql 2^>nul') do (
    set /a count+=1
    echo !count!. %%f
)
if !count!==0 echo   No weekly backups found
echo.

echo MONTHLY BACKUPS (Last 3 months):
echo -------------------------------------------
set /a count=0
for /f "delims=" %%f in ('dir /b /o-d storage\app\backups\monthly\*.sql 2^>nul') do (
    set /a count+=1
    echo !count!. %%f
)
if !count!==0 echo   No monthly backups found
echo.

echo ============================================
echo.

set /p BACKUP_TYPE="Enter backup type (daily/weekly/monthly): "
set /p BACKUP_FILE="Enter exact filename from list above: "

set BACKUP_PATH=storage\app\backups\%BACKUP_TYPE%\%BACKUP_FILE%

if not exist "%BACKUP_PATH%" (
    echo.
    echo ✗ ERROR: Backup file not found!
    echo   Path checked: %BACKUP_PATH%
    echo.
    pause
    exit /b 1
)

echo.
echo ============================================
echo WARNING - READ CAREFULLY
echo ============================================
echo.
echo You are about to restore:
echo   File: %BACKUP_FILE%
echo   Type: %BACKUP_TYPE%
echo   Database: %DB_DATABASE%
echo.
echo This will REPLACE all current data in the database!
echo Make sure MySQL is running in XAMPP!
echo.
echo ============================================

set /p CONFIRM="Type YES (all capitals) to continue: "

if not "%CONFIRM%"=="YES" (
    echo.
    echo ✗ Restore cancelled - you did not type YES
    echo.
    pause
    exit /b 0
)

echo.
echo ============================================
echo Restoring database...
echo ============================================
echo.

REM Build mysql command
if "%DB_PASSWORD%"=="" (
    set MYSQL_CMD=C:\xampp\mysql\bin\mysql.exe -u %DB_USERNAME% %DB_DATABASE%
) else (
    set MYSQL_CMD=C:\xampp\mysql\bin\mysql.exe -u %DB_USERNAME% -p%DB_PASSWORD% %DB_DATABASE%
)

REM Execute restore
%MYSQL_CMD% < "%BACKUP_PATH%"

if %ERRORLEVEL% EQU 0 (
    echo.
    echo ============================================
    echo ✓ Database restored successfully!
    echo ============================================
    echo.
    echo IMPORTANT: Clear Laravel cache now:
    echo.
    php artisan config:clear
    php artisan cache:clear
    echo.
    echo ✓ Cache cleared!
    echo.
) else (
    echo.
    echo ============================================
    echo ✗ Restore failed!
    echo ============================================
    echo.
    echo Possible causes:
    echo   - MySQL is not running
    echo   - Incorrect credentials in .env
    echo   - Database doesn't exist
    echo   - Corrupted backup file
    echo.
)

echo ============================================
pause