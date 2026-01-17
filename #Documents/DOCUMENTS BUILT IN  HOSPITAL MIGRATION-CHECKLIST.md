# DOCUMENTS MODULE - COMPLETE MIGRATION CHECKLIST

## 1. ROUTES
📁 **Location:** `routes/modules/`
- `documents.php` - All document routes

**Action:** Copy this file to production
**Note:** Ensure `routes/web.php` includes this file:
```php
require __DIR__.'/modules/documents.php';
```

---

## 2. CONTROLLERS
📁 **Location:** `app/Http/Controllers/Documents/`
- `DocumentController.php` - Main CRUD controller
- Any other controllers in this folder

**Action:** Copy entire `Documents/` folder to production

---

## 3. MODELS
📁 **Location:** `app/Models/`
- `Document.php` - Main Document model

**Action:** Copy `Document.php` to production

**Check for:**
- Relationships with other models
- Accessors/Mutators
- Scopes
- Traits used

---

## 4. MIGRATIONS
📁 **Location:** `database/migrations/`
- `YYYY_MM_DD_HHMMSS_create_documents_table.php`
- Any related migration files

**Action:** 
1. Copy migration files to production
2. Run `php artisan migrate` on production

**Important:** Check migration for:
- Foreign keys to other tables
- Required indexes
- Soft deletes (`deleted_at`)

---

## 5. BLADE VIEWS
📁 **Location:** `resources/views/documents/`

**Main Views:**
- `index.blade.php` (or `index-SYNCED.blade.php`)
- `create.blade.php`
- `edit.blade.php`
- `show.blade.php` (or `show-FINAL.blade.php`)
- `trashed.blade.php` (or `trashed-FINAL.blade.php`)

**Layouts:**
- `layouts/main.blade.php` (or `main-WITH-SCROLL.blade.php`)

**Partials:**
- `partials/navigation.blade.php`

**Action:** Copy entire `resources/views/documents/` folder to production

---

## 6. LIVEWIRE COMPONENTS
📁 **Location:** `app/Livewire/Documents/` (or `app/Http/Livewire/Documents/`)

**PHP Classes:**
- `DocumentList.php`
- `TrashedList.php`
- `DocumentForm.php` (if used)
- Any other Livewire component classes

**Blade Views:**
📁 **Location:** `resources/views/livewire/documents/`
- `document-list.blade.php`
- `trashed-list.blade.php`
- `document-form.blade.php` (if used)

**Action:** 
1. Copy PHP classes to production
2. Copy Livewire blade views to production

---

## 7. REQUESTS (Form Validation)
📁 **Location:** `app/Http/Requests/Documents/`
- `StoreDocumentRequest.php`
- `UpdateDocumentRequest.php`
- Any other request validation classes

**Action:** Copy entire folder (if exists) to production

---

## 8. POLICIES (Authorization)
📁 **Location:** `app/Policies/`
- `DocumentPolicy.php`

**Action:** Copy policy file to production

**Important:** Check `app/Providers/AuthServiceProvider.php` for policy registration:
```php
protected $policies = [
    Document::class => DocumentPolicy::class,
];
```

---

## 9. MIDDLEWARE
📁 **Check:** `app/Http/Middleware/`
- Any custom middleware used in document routes

**Action:** Copy custom middleware if any exist

---

## 10. SERVICE PROVIDERS
📁 **Check:** `app/Providers/`
- `AuthServiceProvider.php` - For policies
- `AppServiceProvider.php` - For any service bindings

**Action:** 
1. Compare these files between dev and production
2. Merge any document-specific code

---

## 11. STORAGE & PUBLIC FILES
📁 **Locations:**
- `storage/app/public/assets/` - Where uploaded documents are stored
- `public/storage/` - Symlink to storage

**Action:**
1. Create storage directory: `mkdir -p storage/app/public/assets`
2. Create symlink: `php artisan storage:link`
3. Set permissions: `chmod -R 775 storage/`
4. Set ownership: `chown -R www-data:www-data storage/` (Linux/Ubuntu)

**Important:** Check `.env` for:
```
FILESYSTEM_DISK=public
```

---

## 12. ASSETS (CSS/JS)
📁 **Location:** `resources/js/`
- Check if `app.js` has document-specific code
- Theme toggle system integration

📁 **Location:** `resources/css/`
- Check if `app.css` has document-specific styles

**Action:** Compare and merge any document-specific code

---

## 13. TAILWIND CONFIG
📁 **Location:** Root directory
- `tailwind.config.js`

**Check for:**
```javascript
darkMode: 'class', // Required for dark mode
content: [
    './resources/views/documents/**/*.blade.php',
    './app/Livewire/Documents/**/*.php',
],
```

**Action:** Ensure production config includes documents paths

---

## 14. COMPOSER DEPENDENCIES
📁 **Location:** Root directory
- `composer.json`

**Check for packages:**
- Livewire
- Any file handling packages
- Spatie packages (if used)

**Action:**
1. Compare `composer.json` files
2. Run `composer install` on production

---

## 15. NPM DEPENDENCIES
📁 **Location:** Root directory
- `package.json`

**Check for:**
- Alpine.js (for scroll button)
- Any other JS dependencies

**Action:**
1. Compare `package.json` files
2. Run `npm install` and `npm run build` on production

---

## 16. CONFIGURATION FILES
📁 **Location:** `config/`

**Check:**
- `config/filesystems.php` - File upload configuration
- `config/livewire.php` - Livewire settings

**Action:** Compare and merge any document-specific settings

---

## 17. ENVIRONMENT VARIABLES
📁 **Location:** `.env`

**Required variables:**
```
FILESYSTEM_DISK=public
APP_URL=https://your-production-domain.com

# File upload limits (if custom)
UPLOAD_MAX_FILESIZE=200M
POST_MAX_SIZE=200M
```

**Action:** Update `.env` on production

---

## 18. DATABASE SEEDERS (Optional)
📁 **Location:** `database/seeders/`
- `DocumentSeeder.php` (if exists)

**Action:** Copy if you want test data on production

---

## 19. TESTS (Optional)
📁 **Location:** `tests/Feature/Documents/`
- Feature tests for documents

📁 **Location:** `tests/Unit/Documents/`
- Unit tests for documents

**Action:** Copy tests to production (optional, for testing)

---

## 20. PERMISSIONS & ROLES
**Check your permission system:**
- 'manage assets' permission
- Any roles that need access

**Database tables:**
- `permissions`
- `roles`
- `model_has_permissions`
- `model_has_roles`

**Action:** Ensure production has correct permissions seeded

---

## MIGRATION STEPS (In Order)

### Step 1: Code Files
```bash
# Copy all files listed above to production
rsync -avz app/Http/Controllers/Documents/ production:/path/to/app/Http/Controllers/Documents/
rsync -avz app/Models/Document.php production:/path/to/app/Models/
rsync -avz resources/views/documents/ production:/path/to/resources/views/documents/
# ... repeat for all folders
```

### Step 2: Dependencies
```bash
# On production server
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

### Step 3: Database
```bash
# On production server
php artisan migrate
php artisan db:seed --class=PermissionSeeder # If needed
```

### Step 4: Storage
```bash
# On production server
php artisan storage:link
chmod -R 775 storage/
chown -R www-data:www-data storage/
```

### Step 5: Cache & Optimization
```bash
# On production server
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize
```

### Step 6: Livewire
```bash
# On production server
php artisan livewire:discover
```

---

## VERIFICATION CHECKLIST

After migration, verify:
- [ ] Can access `/documents` route
- [ ] Can upload a document
- [ ] Can view document list
- [ ] Can view single document with preview
- [ ] Can edit document
- [ ] Can delete document (soft delete)
- [ ] Can view trashed documents
- [ ] Can restore from trash
- [ ] Can permanently delete
- [ ] Dark/light mode toggle works
- [ ] Scroll to top button appears
- [ ] Pagination works
- [ ] Search/filter works
- [ ] File downloads work
- [ ] Permissions work correctly
- [ ] Mobile responsive

---

## COMMON ISSUES & SOLUTIONS

### Issue: "Class Document not found"
**Solution:** Run `composer dump-autoload`

### Issue: "Livewire component not found"
**Solution:** Run `php artisan livewire:discover`

### Issue: "Storage symlink doesn't work"
**Solution:** 
```bash
rm public/storage
php artisan storage:link
```

### Issue: "Permission denied on uploads"
**Solution:**
```bash
chmod -R 775 storage/
chown -R www-data:www-data storage/
```

### Issue: "Dark mode doesn't work"
**Solution:** Check `tailwind.config.js` has `darkMode: 'class'`

### Issue: "Files not uploading"
**Solution:** Check PHP upload limits in `php.ini`:
```
upload_max_filesize = 200M
post_max_size = 200M
```

---

## FILES TO EXCLUDE (Don't copy these)
- `.git/` - Git repository
- `node_modules/` - NPM dependencies (reinstall)
- `vendor/` - Composer dependencies (reinstall)
- `.env` - Environment file (create new for production)
- `storage/logs/` - Log files
- `storage/framework/cache/` - Cache files
- `storage/app/public/assets/` - Uploaded files (unless migrating data)

---

## QUICK REFERENCE: All Folders to Copy

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Documents/
│   ├── Livewire/Documents/ (or app/Livewire/Documents/)
│   ├── Requests/Documents/
│   └── Middleware/ (if custom)
├── Models/
│   └── Document.php
└── Policies/
    └── DocumentPolicy.php

resources/
├── views/
│   ├── documents/
│   └── livewire/documents/
├── js/
│   └── app.js (merge document code)
└── css/
    └── app.css (merge document styles)

database/
├── migrations/
│   └── *_create_documents_table.php
└── seeders/
    └── DocumentSeeder.php (if exists)

routes/
└── modules/
    └── documents.php

public/
└── storage/ (create symlink)

storage/
└── app/
    └── public/
        └── assets/ (create directory)
```

---

## FINAL NOTES

1. **Backup production database** before running migrations
2. **Test on staging environment** first if available
3. **Use version control** (Git) to track all changes
4. **Document any custom configuration** you've made
5. **Check Laravel logs** after deployment: `storage/logs/laravel.log`

---

## Need Help?
If something doesn't work after migration:
1. Check Laravel logs: `tail -f storage/logs/laravel.log`
2. Check web server logs (Apache/Nginx)
3. Run `php artisan route:list | grep documents` to verify routes
4. Run `php artisan config:clear && php artisan cache:clear`
5. Verify file permissions on storage directory

Good luck with your migration! 🚀
