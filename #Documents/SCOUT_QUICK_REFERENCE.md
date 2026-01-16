# Scout Command Quick Reference

## Installation
```bash
# Place file at: app/Console/Commands/RebuildScoutIndexes.php
```

## Commands at a Glance

| Command | When to Use | What It Does |
|---------|-------------|--------------|
| `scout:rebuild` | After deployment, regular maintenance | Clears caches + reindexes |
| `scout:rebuild --fresh` | Search broken, after model changes | Clears caches + flushes indexes + reindexes |
| `scout:rebuild --sync` | Files in storage but not in DB | Clears caches + syncs files + reindexes |
| `scout:rebuild --fresh --sync` | Initial setup, major data issues | Everything: clear, flush, sync, reindex |

## Common Use Cases

### 🆕 First Time Setup
```bash
php artisan migrate
php artisan scout:rebuild --fresh --sync
```

### 🚀 After Deployment
```bash
php artisan scout:rebuild
```

### 🐛 Search Not Working
```bash
php artisan scout:rebuild --fresh
```

### 📁 Files Missing from Database
```bash
php artisan scout:rebuild --sync
```

### 🔧 After Changing toSearchableArray()
```bash
php artisan scout:rebuild --fresh
```

## What Gets Cleared/Rebuilt

✅ Application cache
✅ Configuration cache  
✅ View cache
✅ Route cache
✅ Document search index
✅ Image search index

## Pro Tips

💡 **Schedule it weekly:**
```php
// In app/Console/Kernel.php
$schedule->command('scout:rebuild')->weekly()->sundays()->at('02:00');
```

💡 **Test in staging first:**
```bash
# Staging
php artisan scout:rebuild --fresh

# Then production
php artisan scout:rebuild
```

💡 **For large datasets:**
```bash
php -d memory_limit=512M artisan scout:rebuild
```

## Need Help?

Check full documentation: SCOUT_COMMAND_GUIDE.md
