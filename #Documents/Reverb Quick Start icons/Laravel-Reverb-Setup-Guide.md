# Complete Laravel Reverb Setup Guide
## After Fresh Windows Install

---

## Table of Contents
1. [VBS Taskbar Shortcuts](#1-vbs-taskbar-shortcuts)
2. [PowerShell Profile Setup](#2-powershell-profile-setup)
3. [Critical Reverb v1.6.3 Fix](#3-critical-reverb-v163-fix)
4. [Windows Firewall Configuration](#4-windows-firewall-configuration)
5. [PM2 Setup](#5-pm2-setup)
6. [MySQL Configuration](#6-mysql-configuration)
7. [Troubleshooting](#7-troubleshooting)

---

## 1. VBS Taskbar Shortcuts

### Create These 3 Files on Your Desktop

**File: StopReverb.vbs**
```vbscript
Set WshShell = CreateObject("WScript.Shell")
WshShell.Run "cmd /c pm2 stop laravel-reverb & timeout /t 2", 1, True
Set WshShell = Nothing
```

**File: StartReverb.vbs**
```vbscript
Set WshShell = CreateObject("WScript.Shell")
WshShell.Run "cmd /c pm2 restart laravel-reverb & timeout /t 2", 1, True
Set WshShell = Nothing
```

**File: StatusReverb.vbs**
```vbscript
Set WshShell = CreateObject("WScript.Shell")
WshShell.Run "cmd /c pm2 status & timeout /t 5", 1, True
Set WshShell = Nothing
```

### Pin to Taskbar
1. Right-click each .vbs file → **Create Shortcut**
2. Right-click the shortcut → **Pin to taskbar**

---

## 2. PowerShell Profile Setup

### Step 1: Enable Script Execution
Open **PowerShell as Administrator** and run:

```powershell
Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
```

Type **Y** and press Enter when prompted.

### Step 2: Create Profile File

```powershell
New-Item -Path $PROFILE -Type File -Force
notepad $PROFILE
```

### Step 3: Add This Code to the File

```powershell
# Laravel Reverb PM2 shortcuts
function Stop-Reverb { pm2 stop laravel-reverb }
function Start-Reverb { pm2 restart laravel-reverb }
function Kill-Reverb { pm2 delete laravel-reverb }
function Status-Reverb { pm2 status }
function Logs-Reverb { pm2 logs laravel-reverb }

# Short aliases
Set-Alias stopreverb Stop-Reverb
Set-Alias startreverb Start-Reverb
Set-Alias killreverb Kill-Reverb
```

**Save and close Notepad.**

### Step 4: Load Profile (First Time Only)

```powershell
. $PROFILE
```

### Available Commands After Setup
- `stopreverb` - Stops Laravel Reverb
- `startreverb` - Restarts Laravel Reverb
- `killreverb` - Deletes from PM2
- `Status-Reverb` - Check status
- `Logs-Reverb` - View logs (Ctrl+C to exit)

### Note for Admin PowerShell
If using PowerShell as Administrator, you need to copy the profile:

```powershell
New-Item -Path "C:\Users\Administrator\Documents\PowerShell" -ItemType Directory -Force
Copy-Item "C:\Users\Administrator\Documents\WindowsPowerShell\Microsoft.PowerShell_profile.ps1" "C:\Users\Administrator\Documents\PowerShell\Microsoft.PowerShell_profile.ps1" -Force
```

Or just load it directly:
```powershell
. "C:\Users\Administrator\Documents\WindowsPowerShell\Microsoft.PowerShell_profile.ps1"
```

---

## 3. Critical Reverb v1.6.3 Fix

### THE PROBLEM
Laravel Reverb v1.6.3 (released Nov 28, 2025) has a breaking change:
- **Old versions:** `'tls' => false` (boolean)
- **New v1.6.3:** `'tls' => []` (array required)

Without this fix, you get "pulse pulse pause" errors.

### Fix #1: app/Providers/AppServiceProvider.php

**Location:** `C:\xampp\htdocs\pmway.hopto.org\app\Providers\AppServiceProvider.php`

**Find line ~26:**
```php
config(['reverb.servers.reverb.options.tls' => false]);
```

**Change to:**
```php
config(['reverb.servers.reverb.options.tls' => []]);
```

**Full context (lines 20-30):**
```php
public function boot(): void
{
    // ✅ FIX: Force Reverb TLS to empty array for v1.6.3 compatibility
    config(['reverb.servers.reverb.options.tls' => []]);

    // ✅ FORCE SESSION CONFIGURATION for cross-machine login
    config([
        'session.domain' => 'pmway.hopto.org',
        'session.secure' => true,
        'session.same_site' => 'lax',
    ]);
```

### Fix #2: config/reverb.php

**Location:** `C:\xampp\htdocs\pmway.hopto.org\config\reverb.php`

**Find line ~21:**
```php
'tls' => false,
```

**Change to:**
```php
'tls' => [],
```

**Full context (lines 18-24):**
```php
'servers' => [
    'reverb' => [
        'host' => env('REVERB_SERVER_HOST', '0.0.0.0'),
        'port' => env('REVERB_SERVER_PORT', 8080),
        'path' => env('REVERB_SERVER_PATH', ''),
        'hostname' => env('REVERB_HOST', 'pmway.hopto.org'),
        'options' => [
            'tls' => [],  // ← CHANGED FROM false
        ],
```

### Apply Changes

After making both changes, clear config cache:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 4. Windows Firewall Configuration

### Allow Port 8080 for Reverb

Open **PowerShell as Administrator** and run:

```powershell
# Inbound rule
netsh advfirewall firewall add rule name="Laravel Reverb WebSocket" dir=in action=allow protocol=TCP localport=8080

# Outbound rule
netsh advfirewall firewall add rule name="Laravel Reverb WebSocket Out" dir=out action=allow protocol=TCP localport=8080
```

### Verify Port is Free

```powershell
netstat -ano | findstr :8080
```

If this returns nothing, port 8080 is available (good!).

---

## 5. PM2 Setup

### Initial Setup

Navigate to your Laravel project and start Reverb with PM2:

```bash
cd C:\xampp\htdocs\pmway.hopto.org

# Start with ecosystem config
pm2 start ecosystem.config.cjs

# Save configuration
pm2 save

# Check status
pm2 status
```

### If PM2 Has Permission Errors

If you see `EPERM //./pipe/rpc.sock` errors:

1. **Close all PowerShell/Git Bash windows**
2. **Open PowerShell as Administrator**
3. Run:

```powershell
# Remove corrupted PM2 cache
Remove-Item -Path "$env:USERPROFILE\.pm2" -Recurse -Force -ErrorAction SilentlyContinue

# Navigate to project
cd C:\xampp\htdocs\pmway.hopto.org

# Start fresh
pm2 start ecosystem.config.cjs
pm2 save
```

### Verify Reverb is Running (No Pulsing)

```powershell
pm2 status
```

You should see:
- **status:** `online` (not constantly restarting)
- **↺** (restart count) should stay fixed, not increasing

**If the restart count keeps increasing, the TLS fix wasn't applied correctly.**

### Your ecosystem.config.cjs File

For reference, your ecosystem file should look like:

```javascript
module.exports = {
    apps: [{
        name: 'laravel-reverb',
        script: 'artisan',
        interpreter: 'php',
        args: 'reverb:start',
        cwd: 'C:/xampp/htdocs/pmway.hopto.org',
        instances: 1,
        autorestart: true,
        watch: false,
        max_memory_restart: '256M',
        error_file: './storage/logs/reverb-error.log',
        out_file: './storage/logs/reverb-out.log',
        log_file: './storage/logs/reverb-combined.log',
        time: true
    }]
};
```

---

## 6. MySQL Configuration

### Prevent ibdata1 File Bloat

**Location:** `C:\xampp\mysql\bin\my.ini`

**Find the `[mysqld]` section and add:**

```ini
[mysqld]
# Enable file-per-table (each table gets its own .ibd file)
innodb_file_per_table=1

# Limit ibdata1 to a reasonable size (prevents unlimited growth)
innodb_data_file_path=ibdata1:10M:autoextend:max:512M

# Set autoextend increment smaller (default is 64MB chunks)
innodb_autoextend_increment=8
```

**Restart MySQL in XAMPP Control Panel for changes to take effect.**

### What This Does
- `innodb_file_per_table=1` - Each table gets its own file (can be deleted when table is dropped)
- `max:512M` - Limits ibdata1 to 512MB instead of growing forever
- Without this, ibdata1 stores all table data and never shrinks, leading to multi-GB files

---

## 7. Troubleshooting

### Reverb Still Pulsing After Fix

**Check if both fixes are applied:**

```bash
# Check AppServiceProvider.php
grep "reverb.servers.reverb.options.tls" app/Providers/AppServiceProvider.php

# Should show: config(['reverb.servers.reverb.options.tls' => []]);
# NOT: config(['reverb.servers.reverb.options.tls' => false]);

# Check config/reverb.php
grep "'tls'" config/reverb.php

# Should show: 'tls' => [],
# NOT: 'tls' => false,
```

**Clear all caches:**

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
rm -f bootstrap/cache/config.php
```

**Restart PM2:**

```powershell
pm2 delete laravel-reverb
pm2 start ecosystem.config.cjs
pm2 save
```

### Check Reverb Logs for Errors

```powershell
pm2 logs laravel-reverb --lines 50
```

Press **Ctrl+C** to exit logs.

**Should NOT see:**
```
Laravel\Reverb\Servers\Reverb\Factory::configureTls(): Argument #1 ($context) must be of type array, bool given
```

**Should see:**
```
INFO  Starting server on 0.0.0.0:8080 (127.0.0.1).
```

### PM2 Won't Start

**Symptom:** `connect EPERM //./pipe/rpc.sock`

**Solution:**

1. Run **PowerShell as Administrator**
2. Delete PM2 cache:
```powershell
Remove-Item -Path "$env:USERPROFILE\.pm2" -Recurse -Force
```
3. Restart PM2:
```powershell
cd C:\xampp\htdocs\pmway.hopto.org
pm2 start ecosystem.config.cjs
pm2 save
```

### Test Reverb Without PM2

To verify Reverb itself works (without PM2):

```bash
cd C:\xampp\htdocs\pmway.hopto.org
php artisan config:clear
php artisan reverb:start
```

If this runs without errors, PM2 is the issue (not Reverb).

### PowerShell Shortcuts Don't Work

**In regular PowerShell:**
```powershell
. $PROFILE
```

**In Admin PowerShell:**
```powershell
. "C:\Users\Administrator\Documents\WindowsPowerShell\Microsoft.PowerShell_profile.ps1"
```

Or set up the Admin profile:
```powershell
New-Item -Path "C:\Users\Administrator\Documents\PowerShell" -ItemType Directory -Force
Copy-Item "C:\Users\Administrator\Documents\WindowsPowerShell\Microsoft.PowerShell_profile.ps1" "C:\Users\Administrator\Documents\PowerShell\Microsoft.PowerShell_profile.ps1" -Force
```

### Port 8080 Already in Use

Check what's using it:
```powershell
netstat -ano | findstr :8080
```

Kill the process (replace PID with actual number from netstat):
```powershell
taskkill /F /PID <PID_NUMBER>
```

Or use a different port in `.env`:
```env
REVERB_PORT=8081
```

Then add firewall rule for the new port.

---

## Quick Reference Commands

### Daily Use
```powershell
# Start Reverb
startreverb

# Stop Reverb
stopreverb

# Check status
Status-Reverb

# View logs
Logs-Reverb
```

### Troubleshooting
```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear

# Check if Reverb works without PM2
php artisan reverb:start

# Restart PM2 completely
pm2 delete laravel-reverb
pm2 start ecosystem.config.cjs
pm2 save
```

### Check Configuration
```bash
# View current Reverb config
php -r "require 'vendor/autoload.php'; \$app = require 'bootstrap/app.php'; \$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap(); var_dump(config('reverb.servers.reverb.options.tls'));"

# Should output: array(0) {}
# NOT: bool(false)
```

---

## Summary of What Was Fixed

### The Root Cause
Laravel Reverb v1.6.3 (released Nov 28, 2025) introduced breaking changes requiring TLS configuration to be an array instead of a boolean.

### The Solution
Changed `'tls' => false` to `'tls' => []` in TWO places:
1. **app/Providers/AppServiceProvider.php** (line ~26) - This was the hidden culprit overriding the config
2. **config/reverb.php** (line ~21)

### Result
- No more "pulse pulse pause" errors
- Reverb starts and stays running
- PM2 restart count stays fixed
- Stable WebSocket connections

---

## Version Information

- **Laravel Reverb:** v1.6.3 (requires array for TLS)
- **PHP:** 8.2.12
- **Windows:** 11
- **XAMPP:** Latest
- **PM2:** Latest

---

**End of Document**

Save this file and keep it handy for future Windows reinstalls!
