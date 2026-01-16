# 📁 Guitar Folder Management System

## Overview
This is a **separate folder management system** that works alongside your existing file management system. Both systems use the same `guitar_scores` table but work independently:

- **File System** (existing): Manages individual files (30,541 files)
- **Folder System** (NEW): Manages folders and their contents (6,244 folders)

## ✅ What This Does

### Folder Features:
1. ✅ **List all folders** with search (6,244 folders, paginated 50 per page)
2. ✅ **Create new folder** (creates on disk + database)
3. ✅ **View files in folder** (displays all files, can play/view them)
4. ✅ **Rename folder** (updates disk + database + all file records)
5. ✅ **Delete folder** (removes folder + all files with warning)
6. ✅ **Search folders** by name

### File Viewing from Folders:
- When viewing a folder, you can **play MP3/MP4** files
- **View PDF** files
- **Download** files
- **Rename** files (uses existing file edit functionality)

## 📦 Files to Deploy

### 1. Controller (NEW)
```
app/Http/Controllers/GuitarFolderController.php
```

### 2. Views (NEW - create folder first)
Create the folder:
```bash
mkdir resources/views/protectedguitar/folders
```

Then copy these 3 files:
```
resources/views/protectedguitar/folders/index.blade.php   (list folders)
resources/views/protectedguitar/folders/show.blade.php    (view folder contents)
resources/views/protectedguitar/folders/edit.blade.php    (rename folder)
```

### 3. Routes (ADD to web.php)
See ROUTES.txt for the exact routes to add.

### 4. Existing Files (KEEP - don't change)
```
app/Http/Controllers/GuitarScoreController.php  ← Your working file controller
resources/views/protectedguitar/simple.blade.php
resources/views/protectedguitar/edit.blade.php
resources/views/protectedguitar/player.blade.php
```

## 🚀 Deployment Steps

### Step 1: Create folders directory
```bash
mkdir resources/views/protectedguitar/folders
```

### Step 2: Copy files
```bash
# Copy controller
cp GuitarFolderController.php app/Http/Controllers/

# Copy views (rename them when copying)
cp folders_index.blade.php resources/views/protectedguitar/folders/index.blade.php
cp folders_show.blade.php resources/views/protectedguitar/folders/show.blade.php
cp folders_edit.blade.php resources/views/protectedguitar/folders/edit.blade.php
```

### Step 3: Add routes to web.php
Open `routes/web.php` and add the routes from `ROUTES.txt` (at the bottom or near your existing guitar routes).

### Step 4: Clear cache
```bash
php artisan route:clear
php artisan cache:clear
php artisan view:clear
```

### Step 5: Test
```
https://pmway.hopto.org/guitar-folders
```

## 🔄 How It Works

### Database Usage
Both systems use the same `guitar_scores` table but filter differently:

**File System:**
```php
WHERE type = 'file'
```

**Folder System:**
```php
WHERE type = 'folder'  // For folder list
WHERE type = 'file' AND parent_path = 'folder_name'  // For files in folder
```

### Renaming a Folder
When you rename a folder, the system updates:
1. The folder name on disk (physical rename)
2. The folder record in database
3. **All file records** that have this folder in their `parent_path`

This keeps everything in sync!

### Deleting a Folder
Strong warnings are shown because deleting a folder:
1. Deletes the physical folder from disk
2. Deletes all physical files inside from disk
3. Deletes the folder record from database
4. Deletes all file records from database

## 🎨 Navigation

The folder views include navigation buttons:
- **Files** button → Goes to file list (existing system)
- **Folders** button → Goes to folder list (new system)

You can optionally add a "Folders" button to your existing file views:
```html
<a href="{{ route('guitar.folders.index') }}" 
   class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg">
    📁 Folders
</a>
```

## ⚠️ Safety Features

1. **Delete confirmation** shows file count and requires explicit confirmation
2. **File operations** reuse your working file controller (view, play, download)
3. **Separate systems** - folder system won't break your working file system
4. **Database updates** are immediate - no need to rebuild database

## 🧪 Testing Checklist

- [ ] Access folder list: `/guitar-folders`
- [ ] Search for a folder
- [ ] Create a new test folder
- [ ] View files in a folder
- [ ] Play an MP3/MP4 from within a folder
- [ ] Rename a folder (check files still work)
- [ ] Delete the test folder (check warning appears)

## 📝 Notes

- This system is **completely separate** from your file system
- File viewing/playing **reuses existing routes** - no duplication
- Both systems can run simultaneously without conflicts
- Your existing file system continues to work exactly as before
