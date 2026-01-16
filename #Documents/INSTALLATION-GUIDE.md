# Reverb Diagnostic Tools - Installation & Usage Guide

## 📦 What You're Installing

Three new diagnostic tools to help debug Reverb configuration issues:

1. **CLI Diagnostic Command** - Comprehensive config testing from command line
2. **Web Test Route** - Visual config testing in your browser
3. **Improved Maintenance Command** - Better cache clearing with Apache restart warnings

---

## 🚀 Installation Steps

### 1. Install the CLI Diagnostic Command

**File:** `app/Console/Commands/ReverbDiagnostic.php`

```bash
# Copy the file to your Laravel project
# Location: app/Console/Commands/ReverbDiagnostic.php
```

**Test it works:**
```bash
php artisan reverb:diagnostic
```

You should see a comprehensive report of your Reverb configuration.

---

### 2. Update Your Maintenance Command

**File:** `app/Console/Commands/RunMaintenance.php`

Replace your existing maintenance command with the improved version.

**Key improvements:**
- ✅ Nuclear cache clearing (physically deletes cache files)
- ✅ Warns you to restart Apache (critical!)
- ✅ Prompts for confirmation before running
- ✅ Shows next steps after completion

**Test it:**
```bash
php artisan system:maintenance --skip-npm
```

---

### 3. Add Web Test Route

**Step A:** Add route to `routes/web.php`

Open `routes/web.php` and add this inside your `auth` middleware group:

```php
// Add this inside: Route::middleware(['auth', 'verified'])->group(function () {

Route::get('/reverb-config-test', function() {
    $envValues = [
        'BROADCAST_DRIVER' => env('BROADCAST_DRIVER'),
        'REVERB_APP_KEY' => env('REVERB_APP_KEY') ? substr(env('REVERB_APP_KEY'), 0, 8).'***' : 'NULL',
        'REVERB_APP_SECRET' => env('REVERB_APP_SECRET') ? substr(env('REVERB_APP_SECRET'), 0, 8).'***' : 'NULL',
        'REVERB_APP_ID' => env('REVERB_APP_ID'),
        'REVERB_HOST' => env('REVERB_HOST'),
        'REVERB_PORT' => env('REVERB_PORT'),
        'REVERB_SCHEME' => env('REVERB_SCHEME'),
    ];

    $configValues = [
        'broadcasting.default' => config('broadcasting.default'),
        'broadcasting.reverb.key' => config('broadcasting.connections.reverb.key') ? substr(config('broadcasting.connections.reverb.key'), 0, 8).'***' : 'NULL',
        'broadcasting.reverb.secret' => config('broadcasting.connections.reverb.secret') ? substr(config('broadcasting.connections.reverb.secret'), 0, 8).'***' : 'NULL',
        'broadcasting.reverb.app_id' => config('broadcasting.connections.reverb.app_id'),
        'broadcasting.reverb.host' => config('broadcasting.connections.reverb.options.host'),
        'broadcasting.reverb.port' => config('broadcasting.connections.reverb.options.port'),
        'broadcasting.reverb.scheme' => config('broadcasting.connections.reverb.options.scheme'),
    ];

    $cacheFiles = [
        'Config Cache' => file_exists(base_path('bootstrap/cache/config.php')) ? '✗ EXISTS' : '✓ Not cached',
        'Routes Cache' => file_exists(base_path('bootstrap/cache/routes-v7.php')) ? '✗ EXISTS' : '✓ Not cached',
    ];

    $envKey = env('REVERB_APP_KEY');
    $configKey = config('broadcasting.connections.reverb.key');
    $valuesMatch = ($envKey === $configKey && $envKey !== null);

    $status = $valuesMatch ? '✅ WORKING' : '❌ MISMATCH';
    $statusColor = $valuesMatch ? 'green' : 'red';

    return view('reverb-test', compact('envValues', 'configValues', 'cacheFiles', 'status', 'statusColor'));
})->name('reverb.test');
```

**Step B:** Create the blade view

**File:** `resources/views/reverb-test.blade.php`

Copy the provided `reverb-test.blade.php` file to this location.

**Test it:**
1. Login to your site
2. Visit: `https://pmway.hopto.org/reverb-config-test`
3. You should see a diagnostic page showing your config

---

## 📖 Usage Guide

### When to Use Each Tool

#### 1. CLI Diagnostic (Use This First)

**Run when:**
- After clearing caches
- After updating .env file
- Before restarting Apache
- When debugging chat issues

**Command:**
```bash
php artisan reverb:diagnostic
```

**What it checks:**
- ✅ .env values being read
- ✅ Config cache values
- ✅ Cache file status
- ✅ Broadcasting configuration
- ✅ File permissions
- ✅ Reverb server status

**Look for:**
- Any NULL values = problem
- "CLI and Config values match" = good
- "CRITICAL ISSUE DETECTED" = need to restart Apache

---

#### 2. Web Test Route (Use After Apache Restart)

**Run when:**
- After restarting Apache
- To verify web context sees correct config
- When CLI shows correct values but browser has errors

**Access:**
```
https://pmway.hopto.org/reverb-config-test
```

**What it shows:**
- ✅ What your web server sees
- ✅ Environment vs Config comparison
- ✅ Cache file status
- ✅ Clear visual indicators

**Look for:**
- Green "✅ WORKING" status = good
- Red "❌ MISMATCH" = restart Apache and refresh

---

#### 3. Maintenance Command (Use Regularly)

**Run when:**
- After composer updates
- After npm updates
- Weekly/monthly maintenance
- Before major deployments

**Command:**
```bash
# Full maintenance
php artisan system:maintenance

# Skip npm (faster, for quick cleanups)
php artisan system:maintenance --skip-npm
```

**What it does:**
- Clears all caches (including physical files)
- Updates composer dependencies
- Rebuilds npm assets (optional)
- Optimizes autoloader
- Caches routes and views (production only)

**CRITICAL:** Must restart Apache after running!

---

## 🔄 Typical Workflow

### Problem: "Getting 500 errors on chat page"

**Step 1: Run CLI diagnostic**
```bash
php artisan reverb:diagnostic
```

**Step 2: If shows problems, clear caches**
```bash
php artisan system:maintenance --skip-npm
```

**Step 3: Restart Apache/XAMPP**
- Stop Apache in XAMPP Control Panel
- Wait 5 seconds
- Start Apache

**Step 4: Verify with CLI again**
```bash
php artisan reverb:diagnostic
```

Should show "✅ CLI and Config values match"

**Step 5: Verify in browser**
```
https://pmway.hopto.org/reverb-config-test
```

Should show green "✅ WORKING"

**Step 6: Restart Reverb**
```bash
pm2 restart laravel-reverb
pm2 save
```

**Step 7: Test chat**
```
https://pmway.hopto.org/chat
```

---

## 🚨 Common Issues & Solutions

### Issue 1: "CLI shows correct values, but web shows NULL"

**Cause:** Config cache is stale, web server hasn't restarted

**Solution:**
```bash
php artisan config:clear
# RESTART APACHE (CRITICAL!)
php artisan reverb:diagnostic
```

---

### Issue 2: "Config cache keeps coming back"

**Cause:** Production environment automatically caches config

**Solution:**
Don't run `php artisan config:cache` on development.

If you need caching (production):
```bash
php artisan config:cache
# RESTART APACHE
```

---

### Issue 3: "Both CLI and web show correct values, but chat still fails"

**Possible causes:**
1. Reverb server not running
2. PM2 using old config
3. Frontend not connecting

**Solution:**
```bash
# Check Reverb status
pm2 status

# Restart Reverb
pm2 restart laravel-reverb
pm2 save

# Check logs
pm2 logs laravel-reverb --lines 50

# Check browser console
# Open browser DevTools > Console tab
# Look for WebSocket errors
```

---

### Issue 4: "Maintenance command doesn't seem to clear cache"

**Cause:** Not restarting Apache after running

**Solution:**
```bash
php artisan system:maintenance --skip-npm
# The command will REMIND you to restart Apache
# ACTUALLY RESTART APACHE (don't skip this!)
php artisan reverb:diagnostic  # Verify
```

---

## 📋 Quick Reference Commands

### Diagnostic Commands
```bash
# Full diagnostic
php artisan reverb:diagnostic

# Check specific values
php artisan tinker
>>> env('REVERB_APP_KEY')
>>> config('broadcasting.connections.reverb.key')
>>> exit
```

### Cache Commands
```bash
# Clear all caches
php artisan optimize:clear

# Clear specific caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Nuclear option (deletes cache files)
php artisan system:maintenance --skip-npm
```

### PM2 Commands
```bash
# Status
pm2 status

# Restart
pm2 restart laravel-reverb

# Logs
pm2 logs laravel-reverb --lines 50

# Save configuration
pm2 save
```

### Apache Commands (Windows)
```bash
# Via command line
net stop Apache2.4
net start Apache2.4

# Or use XAMPP Control Panel
# Stop > Wait > Start
```

---

## 🎯 The Golden Rule

**ALWAYS RESTART APACHE AFTER CLEARING CACHES**

Why? Because:
- Apache loads config into memory
- PHP opcache stores compiled code
- Config changes won't apply until restart

**How to remember:**
The maintenance command now REMINDS you every time!

---

## 📞 Need More Help?

If you're still having issues:

1. Run full diagnostic: `php artisan reverb:diagnostic`
2. Check web test: `https://pmway.hopto.org/reverb-config-test`
3. Check PM2 logs: `pm2 logs laravel-reverb --lines 50`
4. Check Laravel logs: `storage/logs/laravel.log`
5. Check browser console (F12 > Console tab)

Save the output from all of these and you'll have everything needed to debug!

---

## 🎉 You're All Set!

These tools will make debugging Reverb issues much easier. The key takeaways:

✅ Use `php artisan reverb:diagnostic` regularly
✅ Always restart Apache after cache clearing
✅ Use the web test route to verify web context
✅ The maintenance command now guides you through the process

Happy chatting! 💬
