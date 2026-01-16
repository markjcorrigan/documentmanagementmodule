# Scout Rebuild Command Documentation

## Installation

Place the `RebuildScoutIndexes.php` file in:
```
app/Console/Commands/RebuildScoutIndexes.php
```

That's it! Laravel will automatically discover the command.

## Usage

### Basic Usage (Most Common)
```bash
php artisan scout:rebuild
```
This will:
- ✅ Clear all caches (cache, config, view, route)
- ✅ Reindex all existing Documents and Images in the database

### With Fresh Rebuild
```bash
php artisan scout:rebuild --fresh
```
This will:
- ✅ Clear all caches
- ✅ **Flush (delete) existing Scout indexes**
- ✅ Rebuild indexes from scratch

### With File Sync
```bash
php artisan scout:rebuild --sync
```
This will:
- ✅ Clear all caches
- ✅ **Sync files from storage to database** (for files not yet in DB)
- ✅ Reindex all Documents and Images

### Combined Options
```bash
php artisan scout:rebuild --fresh --sync
```
This will:
- ✅ Clear all caches
- ✅ Flush existing indexes
- ✅ Sync files from storage to database
- ✅ Rebuild indexes from scratch

## When to Use This Command

### 1. **After Initial Setup** ✨
```bash
php artisan scout:rebuild --fresh --sync
```
**When:** First time setting up Scout on an existing project with files already in storage.
**Why:** You need to sync existing files to the database and build fresh indexes.

### 2. **After Code Deployment** 🚀
```bash
php artisan scout:rebuild
```
**When:** After deploying new code to production/staging.
**Why:** Clears caches and ensures Scout indexes are up-to-date.

### 3. **When Search Isn't Working** 🔍
```bash
php artisan scout:rebuild --fresh
```
**When:** Users report search not returning expected results, or after changing what's searchable.
**Why:** Completely rebuilds the search index from scratch.

### 4. **After Database Migration** 🗄️
```bash
php artisan scout:rebuild --fresh
```
**When:** After running `php artisan migrate` or `migrate:fresh`.
**Why:** Database changes may have affected records; rebuild ensures indexes match.

### 5. **After Bulk Data Import** 📥
```bash
php artisan scout:rebuild
```
**When:** After importing large amounts of data via seeders, SQL, or API.
**Why:** Newly imported records need to be indexed for search.

### 6. **When Files Exist But DB is Empty** 📁
```bash
php artisan scout:rebuild --sync
```
**When:** Storage has files, but your database is missing records (e.g., after restoring from backup).
**Why:** Syncs physical files into database and creates search indexes.

### 7. **After Changing Searchable Fields** 🔧
```bash
php artisan scout:rebuild --fresh
```
**When:** After modifying the `toSearchableArray()` method in your models.
**Why:** Existing indexes need to be rebuilt with the new searchable fields.

### 8. **Troubleshooting Pagination Bug** 🐛
```bash
php artisan scout:rebuild
```
**When:** Search results show wrong data or pagination is broken.
**Why:** Indexes may be out of sync; rebuilding fixes it.

## What Each Flag Does

### `--fresh`
- **Deletes** all existing Scout indexes
- **Rebuilds** them completely from the database
- **Use when:** Search is broken or returning incorrect results

### `--sync`
- **Scans** storage directories for files
- **Creates** database records for files not yet in DB
- **Skips** files already in the database
- **Use when:** You have files in storage but missing from database

## Example Scenarios

### Scenario 1: New Project Setup
You've just cloned a project that has files in storage but an empty database:
```bash
php artisan migrate
php artisan scout:rebuild --fresh --sync
```

### Scenario 2: Production Deployment
You're deploying code updates to production:
```bash
git pull
composer install --no-dev
php artisan scout:rebuild
```

### Scenario 3: Search Stopped Working
Users report search isn't finding documents they uploaded yesterday:
```bash
php artisan scout:rebuild --fresh
```

### Scenario 4: Weekly Maintenance
Running a scheduled maintenance task every Sunday:
```bash
php artisan scout:rebuild
```
(Add this to your scheduler in `app/Console/Kernel.php`)

## Scheduled Automatic Rebuilds

You can schedule this command to run automatically. Add to `app/Console/Kernel.php`:

```php
protected function schedule(Schedule $schedule)
{
    // Rebuild indexes every Sunday at 2 AM
    $schedule->command('scout:rebuild')->weekly()->sundays()->at('02:00');
    
    // Or rebuild daily at 3 AM
    $schedule->command('scout:rebuild')->dailyAt('03:00');
}
```

## Output Example

```
🚀 Starting Scout Rebuild Process...

📦 Step 1: Clearing all caches...
  - Cleared Application cache
  - Cleared Configuration cache
  - Cleared View cache
  - Cleared Route cache
✅ Caches cleared successfully

🗑️  Step 2: Flushing existing Scout indexes...
  - Flushing Documents index...
  - Flushing Images index...
✅ Indexes flushed successfully

📁 Step 3: Syncing files from storage to database...
  📄 Syncing documents...
    - Processing folder: pending (5 files)
    - Processing folder: contracts (12 files)
  🖼️  Syncing images...
    - Processing images folder (23 files)

  ✅ Synced 17 documents and 23 images
  ℹ️  Skipped 0 files (already in database)

🔍 Step 4: Rebuilding Scout indexes...
  - Indexing 45 documents...
  - Indexing 30 images...
✅ Indexes rebuilt successfully

🎉 Scout rebuild completed successfully!
```

## Best Practices

1. **Run after migrations:** Always rebuild after database structure changes
2. **Monitor performance:** On large datasets (10,000+ records), consider running during low-traffic hours
3. **Test first:** Run on staging/dev before production
4. **Document usage:** Add to your deployment documentation
5. **Schedule it:** Consider weekly automatic rebuilds for data integrity

## Troubleshooting

### Command Not Found
```bash
php artisan list | grep scout
```
If you don't see `scout:rebuild`, make sure the file is in the correct location.

### Out of Memory
For very large datasets:
```bash
php -d memory_limit=512M artisan scout:rebuild
```

### Permission Errors
Make sure Laravel can read storage directories:
```bash
chmod -R 755 storage/
chown -R www-data:www-data storage/
```

## Related Commands

```bash
# Just flush indexes (doesn't rebuild)
php artisan scout:flush "App\Models\Document"

# Just import/rebuild (doesn't flush first)
php artisan scout:import "App\Models\Document"

# Check Scout status
php artisan scout:status
```
