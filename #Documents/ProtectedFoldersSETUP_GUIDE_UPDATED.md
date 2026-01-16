# PROTECTED STORAGE FILES SYSTEM - SETUP GUIDE

Complete duplicate of the Guitar Scores system for managing files in storage/protected

## CONTROLLER NAMES
- **ProtectedStorageFilesController** (file operations)
- **ProtectedStorageFolderController** (folder operations)

These names avoid conflicts with your existing ProtectedFileController.

## INSTALLATION STEPS

### 1. Copy Controllers
Copy these files to `app/Http/Controllers/`:
- ProtectedStorageFilesController.php
- ProtectedStorageFolderController.php

### 2. Run Migrations
```bash
# Run the protected_files table migration (already exists)
php artisan migrate

# Run the indexes migration
# Copy 2025_12_26_add_indexes_to_protected_files_table.php to database/migrations/
php artisan migrate
```

### 3. Update Command
Replace your existing `app/Console/Commands/SetupSystemConfidential.php` with the new version that handles both systems.

### 4. Add Routes
Add the routes from `protectedstorage_routes.php` to your `routes/web.php` file.

### 5. Copy Views
Create the directory structure and copy view files:

```
resources/views/protected/
├── protectedIndex.blade.php
├── protectedEdit.blade.php
└── folders/
    ├── index.blade.php
    ├── show.blade.php
    └── edit.blade.php
```

**Important:** Use the **_updated** versions of the view files (they have the correct route names).

### 6. Configure Storage Disk
Make sure you have the 'protected' disk configured in `config/filesystems.php`:

```php
'protected' => [
    'driver' => 'local',
    'root' => storage_path('protected'),
    'throw' => false,
],
```

## USAGE

### Sync All Files
```bash
# Sync both guitar and protected systems
php artisan system:setup-confidential

# Sync only guitar scores
php artisan system:setup-confidential --system=guitar

# Sync only protected files
php artisan system:setup-confidential --system=protected
```

### Access the System

**View All Files:**
http://yourdomain.com/protected-storage-files

**Browse Folders:**
http://yourdomain.com/protected-storage-folders

**View Specific Folder:**
http://yourdomain.com/protected-storage-folders/{id}

## KEY FEATURES

### File Management
✅ Upload files
✅ View files (inline)
✅ Download files
✅ Edit file metadata (name, description, resource)
✅ Delete files
✅ Search files by name, path, description
✅ Filter by resource or extension

### Folder Management
✅ Browse folder hierarchy
✅ Create new folders
✅ Rename folders (updates all child paths)
✅ Delete folders (removes from disk and database)
✅ Scan individual folders (sync new files)
✅ View folder contents (files + subfolders)
✅ Breadcrumb navigation

### Database Features
✅ Proper parent_path tracking (uses DB::table()->insert())
✅ Resource categorization (top-level folder extraction)
✅ Indexed fields for fast queries
✅ MIME type detection
✅ File size tracking
✅ Last modified timestamps

## ROUTE STRUCTURE

### File Routes
```
GET    /protected-storage-files                    - List all files
POST   /protected-storage-files/upload             - Upload new file
GET    /protected-storage-files/{id}/view          - View file inline
GET    /protected-storage-files/{id}/stream        - Stream file
GET    /protected-storage-files/{id}/download      - Download file
GET    /protected-storage-files/{id}/edit          - Edit file form
PUT    /protected-storage-files/{id}               - Update file
DELETE /protected-storage-files/{id}               - Delete file
```

### Folder Routes
```
GET    /protected-storage-folders                  - List root folders
POST   /protected-storage-folders                  - Create new folder
GET    /protected-storage-folders/{id}             - Show folder contents
GET    /protected-storage-folders/{id}/edit        - Edit folder form
PUT    /protected-storage-folders/{id}             - Update folder
DELETE /protected-storage-folders/{id}             - Delete folder
POST   /protected-storage-folders/{id}/scan        - Scan folder
```

## ROUTE NAMES

All routes use the `protectedstorage` prefix to avoid conflicts:

**File Routes:**
- protectedstorage.index
- protectedstorage.upload
- protectedstorage.view
- protectedstorage.stream
- protectedstorage.download
- protectedstorage.edit
- protectedstorage.update
- protectedstorage.destroy

**Folder Routes:**
- protectedstorage.folders.index
- protectedstorage.folders.store
- protectedstorage.folders.show
- protectedstorage.folders.edit
- protectedstorage.folders.update
- protectedstorage.folders.destroy
- protectedstorage.folders.scan

## DATABASE SCHEMA

### protected_files table
- id (bigint, primary key)
- name (string) - File/folder name
- path (string, unique) - Full path relative to protected disk
- parent_path (string, nullable, indexed) - Parent directory path
- type (enum: 'file', 'folder', indexed) - Item type
- extension (string, nullable, indexed) - File extension
- mime_type (string, nullable) - MIME type
- size (bigint) - Size in bytes
- resource (string, nullable, indexed) - Top-level folder
- description (text, nullable) - User description
- metadata (json, nullable) - Additional metadata
- file_modified_at (timestamp, nullable) - Last modified on disk
- created_at (timestamp)
- updated_at (timestamp)

### Indexes
- parent_path (for hierarchy queries)
- resource (for filtering by category)
- type (for file/folder filtering)
- name (for searching)
- path (for lookups)
- extension (for filtering by type)

## HOW IT WORKS

### parent_path Logic
The system uses `DB::table()->insert()` instead of Eloquent's `create()` to bypass mass assignment protection. This ensures parent_path is always saved:

```php
// Calculate parent_path
$parentPath = dirname($path);
if ($parentPath === '.' || $parentPath === '' || $parentPath === $path) {
    $parentPath = null;
}

// Direct database insert
DB::table('protected_files')->insert([
    'name' => $name,
    'path' => $path,
    'parent_path' => $parentPath,  // ✅ Always saved!
    // ... other fields
]);
```

### Resource Extraction
The 'resource' field automatically extracts the top-level folder:

```php
// Path: 'scientology/books/dianetics.pdf'
// Resource: 'scientology'

$resource = null;
if (strpos($path, '/') !== false) {
    $resource = explode('/', $path)[0];
} else {
    $resource = $path;  // For root-level items
}
```

## VERIFICATION

### Check parent_path values
```sql
SELECT path, parent_path, type, name 
FROM protected_files 
WHERE path LIKE '%your_folder%' 
LIMIT 20;
```

### Count files in a folder
```sql
SELECT COUNT(*) 
FROM protected_files 
WHERE parent_path = 'scientology' 
AND type = 'file';
```

### Check resources
```sql
SELECT resource, COUNT(*) as count 
FROM protected_files 
GROUP BY resource 
ORDER BY count DESC;
```

## TROUBLESHOOTING

### Folders show "0 files"
- Run: `php artisan system:setup-confidential --system=protected`
- Check database: Verify parent_path is not NULL for child items

### Files not appearing
- Make sure file extensions are in the $mimeTypes array
- Check disk configuration points to correct directory
- Verify file permissions on storage/protected

### Scan not working
- Check that Laravel has read permissions on storage/protected
- Verify the folder exists in the database first
- Check Laravel logs for errors

## FILE PLACEMENT SUMMARY

**Controllers** → `app/Http/Controllers/`
- ProtectedStorageFilesController.php
- ProtectedStorageFolderController.php

**Migration** → `database/migrations/`
- 2025_12_26_add_indexes_to_protected_files_table.php

**Command** → `app/Console/Commands/`
- SetupSystemConfidential.php

**Routes** → Add to `routes/web.php`
- Content from protectedstorage_routes.php

**Views** → `resources/views/protected/`
- protectedIndex_updated.blade.php (rename to protectedIndex.blade.php)
- protectedEdit_updated.blade.php (rename to protectedEdit.blade.php)

**Views** → `resources/views/protected/folders/`
- folders_index_updated.blade.php (rename to index.blade.php)
- folders_show_updated.blade.php (rename to show.blade.php)
- folders_edit_updated.blade.php (rename to edit.blade.php)

## DIFFERENCES FROM GUITAR SYSTEM

1. **Controller names:** `ProtectedStorageFilesController` and `ProtectedStorageFolderController`
2. **Route prefix:** `/protected-storage-` instead of `/guitar-`
3. **Route names:** `protectedstorage.*` instead of `guitar.*`
4. **Table name:** `protected_files` (same as before)
5. **Disk name:** `protected` (same as before)
6. **Views location:** `resources/views/protected/` (same as before)

## INTEGRATION WITH EXISTING SYSTEM

Your existing ProtectedFileController remains untouched. The new system uses:
- ProtectedStorageFilesController (for file operations)
- ProtectedStorageFolderController (for folder operations)

Different route names prevent conflicts:
- Old system: Use your existing routes
- New system: Use `protectedstorage.*` routes

## MAINTENANCE

### Regular sync
```bash
# Full sync (rebuilds entire database)
php artisan system:setup-confidential --system=protected
```

### Incremental updates
Use the "Scan Folder" button in the UI to sync individual folders without rebuilding the entire database.

## SUPPORT

If issues arise, check:
1. Laravel logs: `storage/logs/laravel.log`
2. Database parent_path values (should NOT be NULL except for root items)
3. File permissions on storage/protected
4. Disk configuration in config/filesystems.php
5. Controller names match in routes and views

The system is production-ready and handles:
- Thousands of files and folders
- Deep nesting (unlimited levels)
- Large files (up to PHP's upload limit)
- All common file types
