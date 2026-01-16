# DOCUMENTS MODULE - COMPLETE INSTALLATION GUIDE

## 📦 Package Contents

This package contains EVERYTHING you need for a complete Document Management CRUD module with soft/hard deletes.

### Files Included (Total: 18 files)

**Backend Files:**
1. Migration file
2. Model file
3. Controller file
4. 2 Request validation files
5. 3 Livewire component files

**Frontend Files:**
6. 3 Livewire blade views
7. 5 Wrapper blade views

**Routes:**
8. Routes file

**Scripts:**
9. Windows batch script
10. This installation guide

---

## 🚀 STEP-BY-STEP INSTALLATION

### STEP 1: Run the Batch Script

Open Git Bash in your project root:
```bash
cd /c/xampp/htdocs/pmway.hopto.org
```

Copy `DOCUMENTS-create-module.bat` to your project root and run:
```bash
cmd //c DOCUMENTS-create-module.bat
```

This creates all the necessary folders.

---

### STEP 2: Copy Backend Files

#### File 1: Migration
**Source:** `DOCUMENTS-migration-create_documents_table.php`
**Destination:** `database/migrations/YYYY_MM_DD_XXXXXX_create_documents_table.php`

```bash
# Create migration with timestamp
php artisan make:migration create_documents_table
# Then replace the content with the provided migration file
```

#### File 2: Model
**Source:** `DOCUMENTS-Model-Document.php`
**Destination:** `app/Models/Document.php`

```bash
# Replace the entire file content
cp /path/to/DOCUMENTS-Model-Document.php app/Models/Document.php
```

#### File 3: Controller
**Source:** `DOCUMENTS-Controller-DocumentController.php`
**Destination:** `app/Http/Controllers/Documents/DocumentController.php`

```bash
cp /path/to/DOCUMENTS-Controller-DocumentController.php app/Http/Controllers/Documents/DocumentController.php
```

#### File 4: Store Request
**Source:** `DOCUMENTS-Request-StoreDocumentRequest.php`
**Destination:** `app/Http/Requests/Documents/StoreDocumentRequest.php`

```bash
cp /path/to/DOCUMENTS-Request-StoreDocumentRequest.php app/Http/Requests/Documents/StoreDocumentRequest.php
```

#### File 5: Update Request
**Source:** `DOCUMENTS-Request-UpdateDocumentRequest.php`
**Destination:** `app/Http/Requests/Documents/UpdateDocumentRequest.php`

```bash
cp /path/to/DOCUMENTS-Request-UpdateDocumentRequest.php app/Http/Requests/Documents/UpdateDocumentRequest.php
```

#### File 6: Livewire - DocumentList
**Source:** `DOCUMENTS-Livewire-DocumentList.php`
**Destination:** `app/Livewire/Documents/DocumentList.php`

```bash
cp /path/to/DOCUMENTS-Livewire-DocumentList.php app/Livewire/Documents/DocumentList.php
```

#### File 7: Livewire - DocumentForm
**Source:** `DOCUMENTS-Livewire-DocumentForm.php`
**Destination:** `app/Livewire/Documents/DocumentForm.php`

```bash
cp /path/to/DOCUMENTS-Livewire-DocumentForm.php app/Livewire/Documents/DocumentForm.php
```

#### File 8: Livewire - TrashedDocuments
**Source:** `DOCUMENTS-Livewire-TrashedDocuments.php`
**Destination:** `app/Livewire/Documents/TrashedDocuments.php`

```bash
cp /path/to/DOCUMENTS-Livewire-TrashedDocuments.php app/Livewire/Documents/TrashedDocuments.php
```

---

### STEP 3: Copy Frontend Files

#### File 9: Livewire View - List
**Source:** `DOCUMENTS-view-livewire-document-list.blade.php`
**Destination:** `resources/views/livewire/documents/document-list.blade.php`

```bash
cp /path/to/DOCUMENTS-view-livewire-document-list.blade.php resources/views/livewire/documents/document-list.blade.php
```

#### File 10: Livewire View - Form
**Source:** `DOCUMENTS-view-livewire-document-form.blade.php`
**Destination:** `resources/views/livewire/documents/document-form.blade.php`

```bash
cp /path/to/DOCUMENTS-view-livewire-document-form.blade.php resources/views/livewire/documents/document-form.blade.php
```

#### File 11: Livewire View - Trash
**Source:** `DOCUMENTS-view-livewire-trashed-documents.blade.php`
**Destination:** `resources/views/livewire/documents/trashed-documents.blade.php`

```bash
cp /path/to/DOCUMENTS-view-livewire-trashed-documents.blade.php resources/views/livewire/documents/trashed-documents.blade.php
```

#### File 12: Wrapper - Index
**Source:** `DOCUMENTS-view-index.blade.php`
**Destination:** `resources/views/documents/index.blade.php`

```bash
cp /path/to/DOCUMENTS-view-index.blade.php resources/views/documents/index.blade.php
```

#### File 13: Wrapper - Create
**Source:** `DOCUMENTS-view-create.blade.php`
**Destination:** `resources/views/documents/create.blade.php`

```bash
cp /path/to/DOCUMENTS-view-create.blade.php resources/views/documents/create.blade.php
```

#### File 14: Wrapper - Edit
**Source:** `DOCUMENTS-view-edit.blade.php`
**Destination:** `resources/views/documents/edit.blade.php`

```bash
cp /path/to/DOCUMENTS-view-edit.blade.php resources/views/documents/edit.blade.php
```

#### File 15: Wrapper - Show
**Source:** `DOCUMENTS-view-show.blade.php`
**Destination:** `resources/views/documents/show.blade.php`

```bash
cp /path/to/DOCUMENTS-view-show.blade.php resources/views/documents/show.blade.php
```

#### File 16: Wrapper - Trashed
**Source:** `DOCUMENTS-view-trashed.blade.php`
**Destination:** `resources/views/documents/trashed.blade.php`

```bash
cp /path/to/DOCUMENTS-view-trashed.blade.php resources/views/documents/trashed.blade.php
```

---

### STEP 4: Create Routes File

**Source:** `DOCUMENTS-routes-documents.php`
**Destination:** `routes/modules/documents.php`

```bash
cp /path/to/DOCUMENTS-routes-documents.php routes/modules/documents.php
```

---

### STEP 5: Update routes/web.php

Open `routes/web.php` and add this line inside the `Route::middleware(['auth'])->group`:

```php
// Load Document module routes
require __DIR__.'/modules/documents.php';
```

---

### STEP 6: Configure Storage Disk (IMPORTANT!)

Add a custom disk for assets in `config/filesystems.php`:

```php
'disks' => [
    // ... existing disks ...
    
    'public_assets' => [
        'driver' => 'local',
        'root' => storage_path('app/public/assets'),
        'url' => env('APP_URL').'/storage/assets',
        'visibility' => 'public',
    ],
],
```

---

### STEP 7: Ensure Storage Link Exists

```bash
php artisan storage:link
```

---

### STEP 8: Run Migration

```bash
php artisan migrate
```

---

### STEP 9: Clear Cache

```bash
php artisan optimize:clear
```

---

### STEP 10: Test!

Visit: `http://pmway.hopto.org/documents`

Try:
1. Upload a document
2. Search and filter
3. Edit document metadata
4. View document details
5. Download document
6. Delete (soft delete)
7. View trash
8. Restore from trash
9. Permanent delete (hard delete)

---

## 📋 Quick Checklist

Use this to make sure you copied everything:

```
Backend Files:
☐ Migration (database/migrations/)
☐ Model (app/Models/Document.php)
☐ Controller (app/Http/Controllers/Documents/DocumentController.php)
☐ StoreRequest (app/Http/Requests/Documents/StoreDocumentRequest.php)
☐ UpdateRequest (app/Http/Requests/Documents/UpdateDocumentRequest.php)
☐ DocumentList Component (app/Livewire/Documents/DocumentList.php)
☐ DocumentForm Component (app/Livewire/Documents/DocumentForm.php)
☐ TrashedDocuments Component (app/Livewire/Documents/TrashedDocuments.php)

Frontend Files:
☐ document-list.blade.php (resources/views/livewire/documents/)
☐ document-form.blade.php (resources/views/livewire/documents/)
☐ trashed-documents.blade.php (resources/views/livewire/documents/)
☐ index.blade.php (resources/views/documents/)
☐ create.blade.php (resources/views/documents/)
☐ edit.blade.php (resources/views/documents/)
☐ show.blade.php (resources/views/documents/)
☐ trashed.blade.php (resources/views/documents/)

Routes:
☐ documents.php (routes/modules/)
☐ Updated web.php with require statement

Configuration:
☐ Added public_assets disk to config/filesystems.php
☐ Created storage/app/public/assets folder
☐ Ran php artisan storage:link

Commands Run:
☐ php artisan migrate
☐ php artisan optimize:clear

Testing:
☐ Visited /documents
☐ Uploaded test document
☐ Tested all CRUD operations
☐ Tested soft delete
☐ Tested hard delete
☐ Tested restore
```

---

## 🎯 File Naming Convention

All files are prefixed with `DOCUMENTS-` so you can easily find them:
- `DOCUMENTS-migration-*.php`
- `DOCUMENTS-Model-*.php`
- `DOCUMENTS-Controller-*.php`
- `DOCUMENTS-Request-*.php`
- `DOCUMENTS-Livewire-*.php`
- `DOCUMENTS-view-*.blade.php`
- `DOCUMENTS-routes-*.php`

---

## 🔄 Integration with Your Setup:System-Confidential Command

This module is designed to work WITH your existing document sync system:

1. **Manual uploads via CRUD**: Files uploaded through the web interface go directly to `storage/app/public/assets` and are added to the documents table
2. **Manual file drops**: Files copied directly to the assets folder will be picked up by your `Setup:System-Confidential` command
3. **Soft deletes preserve files**: When documents are soft-deleted via the CRUD, files remain in the assets folder and won't be re-added by your sync command
4. **Hard deletes remove files**: Only permanent deletion removes the physical file from the assets folder

### How it works together:
- Your sync command can continue to work as-is
- The CRUD adds a UI layer for managing documents
- Both systems work with the same `documents` table and `assets` folder
- Soft-deleted records (with `deleted_at` set) should be skipped by your sync command

---

## 🆘 Need Help?

If something doesn't work:

1. Check file names match exactly
2. Check namespaces are correct
3. Ensure storage/app/public/assets folder exists and is writable
4. Run `php artisan optimize:clear`
5. Check browser console for JavaScript errors
6. Check Laravel logs: `storage/logs/laravel.log`
7. Verify storage link: `php artisan storage:link`

---

## ✨ What You Get

- Full document library management
- Support for PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, CSV, ZIP, RAR, images
- Beautiful responsive interface with Tailwind CSS
- Real-time search and filtering
- File type filtering
- Sortable columns
- Document preview (images and PDFs)
- File size display
- Icon indicators by file type
- Download functionality
- Soft delete/restore
- Hard delete with file removal
- Comprehensive metadata management
- Integration with your existing file sync system

---

## 🔗 Resource Routes

The module uses Laravel resource routes for clean RESTful URLs:

- `GET /documents` - List all documents
- `GET /documents/create` - Show upload form
- `POST /documents` - Store new document
- `GET /documents/{document}` - Show document details
- `GET /documents/{document}/edit` - Show edit form
- `PUT /documents/{document}` - Update document
- `DELETE /documents/{document}` - Soft delete document
- `GET /documents-trashed` - List trashed documents
- `POST /documents/{id}/restore` - Restore document
- `DELETE /documents/{id}/force-delete` - Permanently delete
- `GET /documents/{document}/download` - Download document
- `GET /downloadbyshortname/{shortname}` - Legacy download route

---

Ready? Let's go! 🚀
