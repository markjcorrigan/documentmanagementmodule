# DOCUMENTS MODULE - QUICK START

## 🎯 What This Package Contains

Complete Document Management CRUD system with:
- ✅ Resource Routes & Model Route Binding
- ✅ Soft Delete & Hard Delete
- ✅ Livewire Components
- ✅ Full CRUD Operations
- ✅ Search & Filter
- ✅ File Upload/Download
- ✅ Document Preview
- ✅ Integration with your assets folder & Setup:System-Confidential

## 📁 Package Structure

```
DOCUMENTS-MODULE-COMPLETE/
├── backend/                    (8 files)
│   ├── Migration
│   ├── Model
│   ├── Controller
│   ├── 2 Request Validators
│   └── 3 Livewire Components
├── frontend/                   (8 files)
│   ├── 3 Livewire Views
│   └── 5 Wrapper Views
├── routes/                     (1 file)
│   └── documents.php
├── scripts/                    (1 file)
│   └── Batch file for Windows
├── INSTALLATION-GUIDE.md
└── config-filesystems-snippet.php
```

**Total: 20 Files**

## ⚡ Super Quick Installation (5 Minutes)

### 1. Run Batch Script
```bash
cd /c/xampp/htdocs/pmway.hopto.org
cmd //c DOCUMENTS-create-module.bat
```

### 2. Copy All Backend Files
```bash
# Copy to app/Models/
cp DOCUMENTS-Model-Document.php app/Models/Document.php

# Copy to app/Http/Controllers/Documents/
cp DOCUMENTS-Controller-DocumentController.php app/Http/Controllers/Documents/DocumentController.php

# Copy to app/Http/Requests/Documents/
cp DOCUMENTS-Request-StoreDocumentRequest.php app/Http/Requests/Documents/StoreDocumentRequest.php
cp DOCUMENTS-Request-UpdateDocumentRequest.php app/Http/Requests/Documents/UpdateDocumentRequest.php

# Copy to app/Livewire/Documents/
cp DOCUMENTS-Livewire-DocumentList.php app/Livewire/Documents/DocumentList.php
cp DOCUMENTS-Livewire-DocumentForm.php app/Livewire/Documents/DocumentForm.php
cp DOCUMENTS-Livewire-TrashedDocuments.php app/Livewire/Documents/TrashedDocuments.php
```

### 3. Copy All Frontend Files
```bash
# Copy Livewire views to resources/views/livewire/documents/
cp DOCUMENTS-view-livewire-document-list.blade.php resources/views/livewire/documents/document-list.blade.php
cp DOCUMENTS-view-livewire-document-form.blade.php resources/views/livewire/documents/document-form.blade.php
cp DOCUMENTS-view-livewire-trashed-documents.blade.php resources/views/livewire/documents/trashed-documents.blade.php

# Copy wrapper views to resources/views/documents/
cp DOCUMENTS-view-index.blade.php resources/views/documents/index.blade.php
cp DOCUMENTS-view-create.blade.php resources/views/documents/create.blade.php
cp DOCUMENTS-view-edit.blade.php resources/views/documents/edit.blade.php
cp DOCUMENTS-view-show.blade.php resources/views/documents/show.blade.php
cp DOCUMENTS-view-trashed.blade.php resources/views/documents/trashed.blade.php
```

### 4. Copy Routes
```bash
cp DOCUMENTS-routes-documents.php routes/modules/documents.php
```

### 5. Update web.php
Add inside auth middleware group:
```php
require __DIR__.'/modules/documents.php';
```

### 6. Configure Filesystem
Add to `config/filesystems.php` (copy from DOCUMENTS-config-filesystems-snippet.php):
```php
'public_assets' => [
    'driver' => 'local',
    'root' => storage_path('app/public/assets'),
    'url' => env('APP_URL').'/storage/assets',
    'visibility' => 'public',
],
```

### 7. Create Migration & Run
```bash
php artisan make:migration create_documents_table
# Copy content from DOCUMENTS-migration-create_documents_table.php
php artisan migrate
```

### 8. Final Commands
```bash
php artisan storage:link
php artisan optimize:clear
```

### 9. Test!
Visit: `http://pmway.hopto.org/documents`

## 🔑 Key Features

### Routes Created:
- `GET /documents` - List all documents
- `GET /documents/create` - Upload form
- `POST /documents` - Store new document
- `GET /documents/{document}` - View details
- `GET /documents/{document}/edit` - Edit form
- `PUT /documents/{document}` - Update
- `DELETE /documents/{document}` - Soft delete
- `GET /documents-trashed` - List trash
- `POST /documents/{id}/restore` - Restore
- `DELETE /documents/{id}/force-delete` - Hard delete
- `GET /documents/{document}/download` - Download

### Livewire Components:
- **DocumentList**: Search, filter, sort, paginate
- **DocumentForm**: Upload/edit with validation
- **TrashedDocuments**: Restore/permanently delete

### File Types Supported:
PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, CSV, ZIP, RAR, JPG, JPEG, PNG, GIF, SVG

### Max File Size: 200MB

## 🔄 Integration Notes

Works seamlessly with your Setup:System-Confidential command:
- Manual CRUD uploads → Direct to assets folder + database
- Manual file drops → Picked up by sync command
- Soft deletes → Files preserved in assets
- Hard deletes → Files removed from assets

## 📞 Support

See DOCUMENTS-00-INSTALLATION-GUIDE.md for detailed instructions.

All files prefixed with `DOCUMENTS-` for easy identification!
