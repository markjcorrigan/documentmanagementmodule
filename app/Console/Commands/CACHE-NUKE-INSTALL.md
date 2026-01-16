# Cache Nuke Command - Installation Instructions

## What This Does

Clears ALL caches in one command:
- ✅ Laravel application cache
- ✅ Config cache
- ✅ Route cache
- ✅ View cache
- ✅ Event cache
- ✅ Bootstrap cached files
- ✅ Compiled classes
- ✅ OPcache (if enabled)
- ✅ Rebuilds autoloader

## Installation

1. **Download the file:** `CacheNuke.php`

2. **Copy it to:** `C:\xampp\htdocs\pmway.hopto.org\app\Console\Commands\CacheNuke.php`

3. **That's it!** Laravel automatically discovers commands in this folder.

## Usage

```bash
# Run the nuclear cache clear
php artisan cache:nuke
```

## After Running

You'll see output like:
```
🧹 NUCLEAR CACHE CLEAR - This will clear EVERYTHING

Clearing Laravel caches...
  ✓ Application cache cleared
  ✓ Config cache cleared
  ✓ Route cache cleared
  ✓ View cache cleared
  ✓ Event cache cleared

Deleting cached files...
  ✓ Bootstrap cache files deleted
  ✓ Framework cache data cleared
  ✓ Compiled views cleared

Clearing compiled classes...
  ✓ Compiled classes cleared

Rebuilding autoloader...
  ✓ Autoloader rebuilt

✅ All caches cleared!

⚠️  NOW YOU MUST:
1. Restart Apache in XAMPP Control Panel
2. Run: pm2 restart laravel-reverb
3. Hard refresh browser (Ctrl+Shift+R)
4. Run: npm run build (if you changed JS files)
```

## When to Use

Use this command when:
- Config changes aren't taking effect
- Routes aren't updating
- Code changes aren't showing up
- Cache seems "stuck"
- After Git merge conflicts
- When things just aren't working!

## Quick Workflow

```bash
# 1. Clear everything
php artisan cache:nuke

# 2. Restart Apache (XAMPP Control Panel)

# 3. Restart Reverb
pm2 restart laravel-reverb

# 4. Rebuild JS (if needed)
npm run build

# 5. Hard refresh browser (Ctrl+Shift+R)
```

That's it! One command to rule them all.
