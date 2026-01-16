# Classical Guitar Scores System - Complete Installation Guide
## Traditional Laravel MVC (NOT Livewire)

---

## 📋 Overview

This is a **traditional Laravel MVC** system (like your Protected Files) for managing classical guitar scores. It uses:
- ✅ Traditional Blade views (not Livewire)
- ✅ Your exact PMWAY style guide and Tailwind patterns
- ✅ Same layout as Protected Files (`documents.documentlayout.default`)
- ✅ Dedicated folder: `storage/app/protectedGuitar/`
- ✅ Dedicated table: `guitar_scores`
- ✅ Searchable by: composer, title, performer, filename

---

## 📁 File Placement Guide

### 1. Controller
```
📂 app/Http/Controllers/
   └── GuitarScoreController.php         ← Copy from: GuitarScoreController.php
```

### 2. Model
```
📂 app/Models/
   └── GuitarScore.php                   ← Copy from: GuitarScore.php
```

### 3. Migration
```
📂 database/migrations/
   └── 2025_12_23_000001_create_guitar_scores_table.php   ← Copy from: 2025_12_23_create_guitar_scores_table.php
```

### 4. Views - CREATE NEW FOLDER
```
📂 resources/views/
   └── 📂 protectedguitar/               ← CREATE THIS FOLDER
       ├── index.blade.php                ← Copy from: guitar-index.blade.php
       └── edit.blade.php                 ← Copy from: guitar-edit.blade.php
```

**IMPORTANT:** The folder MUST be named `protectedguitar` (all lowercase, no dashes).

---

## 🚀 Installation Steps

### Step 1: Copy Files

1. **Controller:**
   ```bash
   # Copy to app/Http/Controllers/
   cp GuitarScoreController.php C:\xampp\htdocs\pmway.hopto.org\app\Http\Controllers\
   ```

2. **Model:**
   ```bash
   # Copy to app/Models/
   cp GuitarScore.php C:\xampp\htdocs\pmway.hopto.org\app\Models\
   ```

3. **Migration:**
   ```bash
   # Copy to database/migrations/
   cp 2025_12_23_create_guitar_scores_table.php C:\xampp\htdocs\pmway.hopto.org\database\migrations\
   ```

4. **Views:**
   ```bash
   # Create the folder
   mkdir C:\xampp\htdocs\pmway.hopto.org\resources\views\protectedguitar
   
   # Copy views
   cp guitar-index.blade.php C:\xampp\htdocs\pmway.hopto.org\resources\views\protectedguitar\index.blade.php
   cp guitar-edit.blade.php C:\xampp\htdocs\pmway.hopto.org\resources\views\protectedguitar\edit.blade.php
   ```

---

### Step 2: Add Filesystem Disk

Open `config/filesystems.php` and add the `protectedGuitar` disk in the `'disks'` array:

```php
'disks' => [
    // ... existing disks ...
    
    'protected' => [
        'driver' => 'local',
        'root' => storage_path('protected'),
        'visibility' => 'private',
        'throw' => false,
    ],
    
    // ADD THIS:
    'protectedGuitar' => [
        'driver' => 'local',
        'root' => storage_path('app/protectedGuitar'),
        'visibility' => 'private',
        'throw' => false,
    ],
],
```

---

### Step 3: Add Routes

Open `routes/web.php` and add these routes (place them near your protected files routes):

```php
// Guitar Scores Routes
Route::middleware(['auth', 'permission:guitar scores'])
    ->prefix('guitar-scores')
    ->name('guitar.')
    ->group(function () {
        
        // Main list page
        Route::get('/', [App\Http\Controllers\GuitarScoreController::class, 'index'])
            ->name('index');
        
        // Upload file
        Route::post('/upload', [App\Http\Controllers\GuitarScoreController::class, 'upload'])
            ->name('upload');
        
        // Create folder
        Route::post('/folder', [App\Http\Controllers\GuitarScoreController::class, 'createFolder'])
            ->name('folder');
        
        // Edit form
        Route::get('/{id}/edit', [App\Http\Controllers\GuitarScoreController::class, 'edit'])
            ->name('edit');
        
        // Update
        Route::put('/{id}', [App\Http\Controllers\GuitarScoreController::class, 'update'])
            ->name('update');
        
        // Delete
        Route::delete('/{id}', [App\Http\Controllers\GuitarScoreController::class, 'destroy'])
            ->name('destroy');
        
        // Download
        Route::get('/{id}/download', [App\Http\Controllers\GuitarScoreController::class, 'download'])
            ->name('download');
    });
```

---

### Step 4: Run Migration

```bash
cd C:\xampp\htdocs\pmway.hopto.org
php artisan migrate
```

---

### Step 5: Create the Permission

Run in tinker:

```bash
php artisan tinker
```

Then:

```php
// Create the permission
\Spatie\Permission\Models\Permission::create(['name' => 'guitar scores']);

// Assign to Super Admin role
$superAdminRole = \Spatie\Permission\Models\Role::where('name', 'Super Admin')->first();
$superAdminRole->givePermissionTo('guitar scores');

// Or assign to your user directly
$user = \App\Models\User::where('email', 'markjc@mweb.co.za')->first();
$user->givePermissionTo('guitar scores');

exit
```

---

### Step 6: Create the Storage Folder

```bash
# Create the folder
mkdir C:\xampp\htdocs\pmway.hopto.org\storage\app\protectedGuitar

# Set permissions (if needed)
chmod 755 C:\xampp\htdocs\pmway.hopto.org\storage\app\protectedGuitar
```

---

### Step 7: Update SetupSystemConfidential (Optional)

If you want database sync functionality, add the methods from `setup_command_additions.php` to your `SetupSystemConfidential` command.

---

## ✅ Testing Your Installation

1. **Clear caches:**
   ```bash
   php artisan route:clear
   php artisan view:clear
   php artisan config:clear
   ```

2. **Visit the page:**
   ```
   http://localhost/guitar-scores
   ```
   or
   ```
   https://pmway.hopto.org/guitar-scores
   ```

3. **You should see:**
   - The guitar scores index page
   - Upload form
   - Create folder form
   - Search/filter options

4. **Test uploading:**
   - Upload a PDF
   - Fill in composer, title, performer
   - Click "Upload Score"
   - Should see success message

5. **Test editing:**
   - Click "Edit" on any score
   - Update metadata
   - Save
   - Should see updated info

---

## 🎯 Route Names Reference

Use these in your Blade views or links:

```php
// Main page
route('guitar.index')

// Upload (POST)
route('guitar.upload')

// Create folder (POST)
route('guitar.folder')

// Edit page
route('guitar.edit', $file->id)

// Update (PUT)
route('guitar.update', $file->id)

// Delete (DELETE)
route('guitar.destroy', $file->id)

// Download
route('guitar.download', $file->id)
```

---

## 📊 Database Structure

### Table: `guitar_scores`

```
id
name                 - Filename
path                 - Relative path
parent_path          - Parent folder
type                 - 'file' or 'folder'
extension            - File extension
mime_type            - MIME type
size                 - File size in bytes
composer             - Composer name (NEW)
title                - Score title (NEW)
performer            - Performer name (NEW)
notes                - Additional notes (NEW)
file_modified_at     - Last modified timestamp
created_at
updated_at
```

---

## 🎨 Styling Details

All views follow your PMWAY style guide:

### Colors Used
- **Outer background**: `dark:bg-zinc-800` (#27272a)
- **Content areas**: `bg-white dark:bg-gray-900` (#111827)
- **Sections**: `bg-white dark:bg-gray-800` (#1f2937)
- **Cards/nested**: `dark:bg-gray-700` (#374151)

### Form Elements
- Inputs/Selects: Full Tailwind with dark mode variants
- Buttons: Blue (primary), Green (success), Yellow (edit), Red (delete)
- All with hover states and transitions

### Responsive
- Mobile: Single column, card view
- Desktop: Grid layout, table view
- Pagination included

---

## 🔄 TrueMirror Integration

Your TrueMirror script has been updated to track guitar scores separately.

**After running TrueMirror:**

1. You'll see a guitar scores report:
   ```
   D:\MirrorReports\MirrorReport_[DATE]\GuitarScoresReport_[DATE].txt
   ```

2. Console shows summary:
   ```
   Guitar Scores Summary:
     PDFs Added: 5
     PDFs Updated: 2
     Total Guitar Files Changed: 7
   ```

3. Sync the database:
   ```bash
   php artisan system:setup-confidential
   # Choose "yes" for Guitar Scores rebuild
   ```

---

## 🔍 Usage Examples

### Searching

**By composer:**
```
URL: /guitar-scores?composer=Bach
```

**By performer:**
```
URL: /guitar-scores?performer=John Williams
```

**Full text search:**
```
URL: /guitar-scores?search=prelude
```

**Combined:**
```
URL: /guitar-scores?composer=Bach&type=file&search=cello
```

### Programmatic Access

```php
// Search for Bach scores
$bachScores = GuitarScore::where('composer', 'like', '%Bach%')
    ->files()
    ->get();

// Get all composers
$composers = GuitarScore::getComposers();

// Get all performers
$performers = GuitarScore::getPerformers();

// Statistics
$stats = GuitarScore::getStatistics();
```

---

## 🎸 Folder Organization

Recommended structure in `storage/app/protectedGuitar/`:

```
protectedGuitar/
├── Bach/
│   ├── Cello_Suite_No_1.pdf
│   └── Prelude_in_D_Minor.pdf
├── Sor/
│   ├── Studies_Op_6.pdf
│   └── Grand_Solo_Op_14.pdf
├── Tarrega/
│   └── Recuerdos_de_la_Alhambra.pdf
└── Collections/
    └── Renaissance_Lute_Music.zip
```

---

## 🆘 Troubleshooting

### Views not found?
- Check folder name: Must be `protectedguitar` (all lowercase)
- Check file names: `index.blade.php` and `edit.blade.php`

### Permission denied?
```php
// In tinker
$user = \App\Models\User::find(YOUR_ID);
$user->givePermissionTo('guitar scores');
```

### Files not uploading?
- Check folder exists: `storage/app/protectedGuitar/`
- Check permissions: `chmod 755 storage/app/protectedGuitar/`
- Check disk configured in `config/filesystems.php`

### Routes not working?
```bash
php artisan route:list | grep guitar
# Should show all guitar routes

php artisan route:clear
php artisan config:clear
```

---

## 📝 Next Steps

1. **Add to navigation** - Add a link in your main navigation:
   ```blade
   <a href="{{ route('guitar.index') }}">
       🎸 Guitar Scores
   </a>
   ```

2. **Test thoroughly:**
   - Upload files
   - Edit metadata
   - Search/filter
   - Download files
   - Delete files
   - Create folders

3. **Populate with scores:**
   - Copy your PDFs to `storage/app/protectedGuitar/`
   - Run `php artisan system:setup-confidential`
   - Choose "yes" for Guitar Scores rebuild

4. **Use TrueMirror:**
   - Mirror your files
   - Check the guitar report
   - Sync database

---

## ✅ Files Checklist

- [ ] GuitarScoreController.php → `app/Http/Controllers/`
- [ ] GuitarScore.php → `app/Models/`
- [ ] Migration file → `database/migrations/`
- [ ] index.blade.php → `resources/views/protectedguitar/`
- [ ] edit.blade.php → `resources/views/protectedguitar/`
- [ ] Updated `config/filesystems.php`
- [ ] Added routes to `routes/web.php`
- [ ] Ran `php artisan migrate`
- [ ] Created `guitar scores` permission
- [ ] Created `storage/app/protectedGuitar/` folder
- [ ] Tested the page loads
- [ ] Tested upload works
- [ ] Tested edit works
- [ ] Tested search works

---

## 🎉 Summary

You now have a complete **traditional Laravel MVC** guitar scores system that:

✅ Follows your Protected Files architecture exactly  
✅ Uses your PMWAY style guide and Tailwind patterns  
✅ Has dedicated folder and table  
✅ Searchable by composer, title, performer  
✅ Upload, edit, delete, download functionality  
✅ TrueMirror integration with separate tracking  
✅ Same layout and components as your other pages  
✅ Full dark mode support  
✅ Responsive design  

No Livewire, no SPA complexity - just clean, traditional Laravel MVC following your existing patterns!
