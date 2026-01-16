# Laravel MySQL Backup System - Complete Guide

## Table of Contents
1. [Overview](#overview)
2. [Installation](#installation)
3. [How It Works](#how-it-works)
4. [Backup Schedule](#backup-schedule)
5. [Viewing Backups](#viewing-backups)
6. [Restoring Backups](#restoring-backups)
7. [Manual Backup](#manual-backup)
8. [Monitoring](#monitoring)
9. [Troubleshooting](#troubleshooting)
10. [File Locations](#file-locations)

---

## Overview

This automated backup system creates regular MySQL database backups with intelligent rotation:
- **Daily backups**: Every day at 2:30 AM (keeps last 7)
- **Weekly backups**: Every Sunday at 4:00 AM (keeps last 4)
- **Monthly backups**: 1st of each month at 5:00 AM (keeps last 3)

**Total backups stored**: Up to 14 files (7 daily + 4 weekly + 3 monthly)

---

## Installation

### Step 1: Create Required Files

**1. Create Backup Command**

File: `app/Console/Commands/BackupDatabase.php`
- This file handles the actual backup creation and rotation
- Already contains logic for mysqldump and file management

**2. Create List Backups Command**

File: `app/Console/Commands/ListBackups.php`
- This file displays all available backups
- Shows file sizes, dates, and storage summary

**3. Update Kernel Scheduler**

File: `app/Console/Kernel.php`
- Already updated with backup scheduling
- Includes your existing scheduled tasks (visitors, notes, etc.)

### Step 2: Create Batch Files

**1. Create Setup Script** - `setup-task-scheduler.bat`
```batch
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
```

**2. Create Scheduler Runner** - `run-scheduler.bat`
```batch
@echo off
cd /d C:\xampp\htdocs\pmway.hopto.org
php artisan schedule:run >> storage\logs\scheduler.log 2>&1
```

**3. Create Test Backup Script** - `test-backup.bat`
```batch
@echo off
echo ============================================
echo Testing Backup System
echo ============================================
echo.

cd /d C:\xampp\htdocs\pmway.hopto.org

echo [1/3] Testing daily backup...
php artisan db:backup --type=daily
echo.

echo [2/3] Testing weekly backup...
php artisan db:backup --type=weekly
echo.

echo [3/3] Testing monthly backup...
php artisan db:backup --type=monthly
echo.

echo ============================================
echo Backup files created:
echo ============================================
echo.

echo DAILY BACKUPS:
dir storage\app\backups\daily\*.sql /B /O-D 2>nul
echo.

echo WEEKLY BACKUPS:
dir storage\app\backups\weekly\*.sql /B /O-D 2>nul
echo.

echo MONTHLY BACKUPS:
dir storage\app\backups\monthly\*.sql /B /O-D 2>nul
echo.

echo ============================================
echo Test complete! Check files above.
echo ============================================
pause
```

**4. Create List Backups Script** - `list-backups.bat`
```batch
@echo off
cd /d C:\xampp\htdocs\pmway.hopto.org
php artisan db:list-backups
pause
```

**5. Create Restore Backup Script** - `restore-backup.bat`
```batch
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
```

### Step 3: Install and Test

1. **Right-click** `setup-task-scheduler.bat` → **Run as Administrator**
2. Double-click `test-backup.bat` to create test backups
3. Double-click `list-backups.bat` to view them

---

## How It Works

### Backup Process

1. **Scheduler runs every minute** via Windows Task Scheduler
2. **Laravel checks schedule** to see if any commands need to run
3. **At scheduled time**, the backup command executes:
   - Connects to MySQL using credentials from `.env`
   - Uses `mysqldump` to export database
   - Saves to `storage/app/backups/{type}/` folder
   - Removes oldest backup if limit exceeded

### File Rotation

**Daily (keeps 7):**
- Day 1-7: Backups accumulate
- Day 8: Oldest (Day 1) deleted, Day 8 created
- Day 9: Day 2 deleted, Day 9 created
- Always maintains exactly 7 files

**Weekly (keeps 4):**
- Week 1-4: Backups accumulate  
- Week 5: Week 1 deleted, Week 5 created

**Monthly (keeps 3):**
- Month 1-3: Backups accumulate
- Month 4: Month 1 deleted, Month 4 created

---

## Backup Schedule

| Backup Type | Frequency | Time | Retention |
|-------------|-----------|------|-----------|
| Daily | Every day | 2:30 AM | 7 days |
| Weekly | Every Sunday | 4:00 AM | 4 weeks |
| Monthly | 1st of month | 5:00 AM | 3 months |

**Your complete schedule:**
```
01:00 AM - Notes reindex
02:00 AM - Notes cleanup shares
02:30 AM - Daily database backup ⭐
03:00 AM - Notes cleanup files (Sundays)
04:00 AM - Weekly database backup (Sundays) ⭐
05:00 AM - Monthly database backup (1st) ⭐
06:00 AM - Clean old logs (Mondays)
11:55 PM - Generate stats
Every 10 min - Close inactive visitors
```

---

## Viewing Backups

### Method 1: Command Line
```bash
# View all backups
php artisan db:list-backups

# View only daily
php artisan db:list-backups --type=daily

# View only weekly
php artisan db:list-backups --type=weekly

# View only monthly
php artisan db:list-backups --type=monthly
```

### Method 2: Batch File

Double-click: `list-backups.bat`

### Method 3: File Explorer

Navigate to:
```
C:\xampp\htdocs\pmway.hopto.org\storage\app\backups\
├── daily\
├── weekly\
└── monthly\
```

---

## Restoring Backups

### ⚠️ IMPORTANT: Before Restoring

1. **Make sure MySQL is running** in XAMPP Control Panel (green)
2. **Backup current database** if needed (run a manual backup first)
3. **Know which backup you want** (use `list-backups.bat` to see them)
4. **Close your application** (no users should be active)

### Restore Process

**Step 1: Run restore script**
```
Double-click: restore-backup.bat
```

**Step 2: Select backup type**
```
Enter backup type (daily/weekly/monthly): daily
```

**Step 3: Enter exact filename**
```
Enter exact filename from list above: pmway_daily_2025-12-16_023000.sql
```

**Step 4: Confirm**
```
Type YES (all capitals) to continue: YES
```

**Step 5: Wait for completion**
The script will:
- Restore the database
- Clear Laravel cache automatically
- Show success or error message

### Manual Restore (Alternative)

If the batch file doesn't work:
```bash
# 1. Navigate to project
cd C:\xampp\htdocs\pmway.hopto.org

# 2. Restore database
C:\xampp\mysql\bin\mysql.exe -u root -p your_database_name < storage\app\backups\daily\backup_file.sql

# 3. Clear Laravel cache
php artisan config:clear
php artisan cache:clear
```

---

## Manual Backup

### Create Immediate Backup
```bash
# Daily backup
php artisan db:backup --type=daily

# Weekly backup
php artisan db:backup --type=weekly

# Monthly backup
php artisan db:backup --type=monthly
```

### Quick Manual Backup

Double-click: `test-backup.bat`

---

## Monitoring

### Check if Scheduler is Running

**Method 1: Task Scheduler**
1. Press Windows key
2. Type "Task Scheduler"
3. Look for "Laravel Scheduler"
4. Check "Last Run Time" and "Next Run Time"

**Method 2: Check Logs**
```bash
# View scheduler activity
type storage\logs\scheduler.log

# View backup specific logs
type storage\logs\backup.log

# View Laravel logs
type storage\logs\laravel.log | findstr "backup"
```

### Verify Backups are Being Created
```bash
# List recent backups
dir storage\app\backups\daily /O-D

# Or use the artisan command
php artisan db:list-backups
```

### Check Disk Space

The `db:list-backups` command shows:
- Total storage used by backups
- Free space on drive

---

## Troubleshooting

### Problem: Backups Not Being Created

**Check 1: Is scheduler running?**
```bash
# Open Task Scheduler
# Look for "Laravel Scheduler"
# Check if it ran recently
```

**Check 2: Test manually**
```bash
cd C:\xampp\htdocs\pmway.hopto.org
php artisan db:backup --type=daily
```

**Check 3: Look at logs**
```bash
type storage\logs\backup.log
type storage\logs\laravel.log
```

**Common fixes:**
- MySQL not running → Start MySQL in XAMPP
- Wrong credentials → Check `.env` file
- No permissions → Run `setup-task-scheduler.bat` as Administrator
- Path issues → Verify `mysqldump.exe` path in `BackupDatabase.php`

---

### Problem: Restore Fails

**Error: "Cannot connect to MySQL"**
- Start MySQL in XAMPP Control Panel
- Verify it shows green/running

**Error: "Access denied"**
- Check `.env` credentials
- Try: `mysql -u root -p` to test login

**Error: "Database doesn't exist"**
- Create database first: `CREATE DATABASE your_database_name;`

**Error: "File not found"**
- Check exact filename (use `list-backups.bat`)
- Verify file exists in `storage/app/backups/`

---

### Problem: Scheduler Stops Working

**Restart scheduler:**
1. Right-click `setup-task-scheduler.bat`
2. Run as Administrator
3. This recreates the task

**Check Windows Task Scheduler service:**
1. Press Windows + R
2. Type: `services.msc`
3. Find "Task Scheduler"
4. Make sure it's "Running"

---

### Problem: Backups Too Large

**Check backup size:**
```bash
php artisan db:list-backups
```

**Solutions:**
- Adjust retention (keep fewer backups)
- Clean old data from database
- Compress backups (add to script)

**Edit retention in:**
`app/Console/Commands/BackupDatabase.php` (line 80-84)
```php
$limits = [
    'daily' => 5,    // Reduced from 7
    'weekly' => 2,   // Reduced from 4
    'monthly' => 2,  // Reduced from 3
];
```

---

## File Locations

### Application Files
```
C:\xampp\htdocs\pmway.hopto.org\
├── app\Console\Commands\
│   ├── BackupDatabase.php          ← Backup creation
│   └── ListBackups.php              ← Backup listing
├── app\Console\Kernel.php           ← Schedule configuration
├── storage\app\backups\
│   ├── daily\                       ← Daily backups
│   ├── weekly\                      ← Weekly backups
│   └── monthly\                     ← Monthly backups
├── storage\logs\
│   ├── backup.log                   ← Backup activity log
│   ├── scheduler.log                ← Scheduler activity
│   └── laravel.log                  ← General Laravel log
├── setup-task-scheduler.bat         ← Setup Windows scheduler
├── run-scheduler.bat                ← Scheduler runner
├── test-backup.bat                  ← Test backups
├── list-backups.bat                 ← View backups
└── restore-backup.bat               ← Restore backups
```

### MySQL Tools
```
C:\xampp\mysql\bin\
├── mysql.exe                        ← MySQL client
├── mysqldump.exe                    ← Backup tool
└── my.ini                           ← MySQL config
```

---

## Advanced Configuration

### Change Backup Times

Edit `app/Console/Kernel.php`:
```php
// Change daily backup time
$schedule->command('db:backup --type=daily')
    ->dailyAt('03:00')  // Changed to 3 AM

// Change weekly day/time
$schedule->command('db:backup --type=weekly')
    ->weeklyOn(1, '05:00')  // Monday at 5 AM

// Change monthly day/time
$schedule->command('db:backup --type=monthly')
    ->monthlyOn(15, '06:00')  // 15th at 6 AM
```

### Add Email Notifications

Install mail package, then edit `Kernel.php`:
```php
$schedule->command('db:backup --type=daily')
    ->dailyAt('02:30')
    ->emailOutputOnFailure('admin@example.com');
```

### Compress Backups

Edit `app/Console/Commands/BackupDatabase.php` line 75:

Change:
```php
$command = sprintf(
    '"%s" --user=%s --password=%s --host=%s --port=%s %s > "%s" 2>&1',
```

To:
```php
$command = sprintf(
    '"%s" --user=%s --password=%s --host=%s --port=%s %s | gzip > "%s.gz" 2>&1',
```

---

## Quick Reference Commands
```bash
# Test backup system
test-backup.bat

# View all backups
list-backups.bat

# Restore backup
restore-backup.bat

# Manual backup
php artisan db:backup --type=daily

# View backups (CLI)
php artisan db:list-backups

# Check scheduler
php artisan schedule:list

# Run scheduler once
php artisan schedule:run

# Clear cache
php artisan config:clear
php artisan cache:clear
```

---

## Support

**Log Locations:**
- Backup logs: `storage/logs/backup.log`
- Scheduler logs: `storage/logs/scheduler.log`
- Laravel logs: `storage/logs/laravel.log`

**Check System:**
```bash
# Test database connection
php artisan tinker
>>> DB::connection()->getPdo();

# Test scheduler
php artisan schedule:run

# Test backup
php artisan db:backup --type=daily
```

**Common Issues:**
1. MySQL not running → Start in XAMPP
2. Wrong credentials → Check `.env`
3. No permissions → Run as Administrator
4. Path issues → Verify paths in code

---

## Maintenance Schedule

**Daily:** Automatic (handled by scheduler)

**Weekly:**
- Check `list-backups.bat` to verify backups exist
- Review `storage/logs/backup.log` for errors

**Monthly:**
- Test restore on a copy of database
- Verify disk space
- Review backup sizes

**Quarterly:**
- Test full disaster recovery
- Update documentation if needed
- Review and adjust retention if needed

---

## Version History

**v1.0** - Initial release
- Daily, weekly, monthly backups
- Automatic rotation
- List and restore utilities
- Full documentation

---

**Last Updated:** December 16, 2025
**Maintained By:** Your Name
**Project:** PMWay Application

---

## Need Help?

If backups fail consistently:

1. Check logs: `storage/logs/backup.log`
2. Test manually: `php artisan db:backup --type=daily`
3. Verify MySQL: Check XAMPP Control Panel
4. Check credentials: Review `.env` file
5. Test restore: Try restoring a backup to verify integrity

For urgent issues, manually export via phpMyAdmin:
http://localhost/phpmyadmin → Export → SQL → Go