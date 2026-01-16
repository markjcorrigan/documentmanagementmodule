# Duplicate Filename Protection

## Problem Solved:

Previously, if you had files with the same name in different folders:
- `/Bach_Preludes/prelude1.pdf`
- `/Chopin_Preludes/prelude1.pdf`

Both would show as "prelude1.pdf" in the list, making it unclear which was which. You could accidentally overwrite one when renaming or uploading.

## Solutions Implemented:

### 1. ✅ Show Parent Folder in File List

**File:** `simple.blade.php`

The file list now shows which folder each file belongs to:
```
prelude1.pdf
📁 Bach_Preludes        ← Now visible!
.PDF | 2.5 MB | Dec 24, 2025
```

Files in root folder show:
```
test.pdf
📁 Root folder
.PDF | 150 KB | Dec 24, 2025
```

### 2. ✅ Duplicate Upload Prevention

**File:** `GuitarScoreController.php` → `upload()` method

Before uploading, the system checks if a file with that path already exists:
```php
$existingFile = DB::table('guitar_scores')
    ->where('type', 'file')
    ->where('path', $fileName)
    ->first();

if ($existingFile) {
    return back()->with('error', "⚠️ File '{$fileName}' already exists...");
}
```

**Error message example:**
```
⚠️ File 'prelude1.pdf' already exists in root folder. 
Please rename the file before uploading or delete the existing file first.
```

### 3. ✅ Duplicate Rename Prevention

**File:** `GuitarScoreController.php` → `update()` method

When renaming, the system checks if another file with that name already exists in the same folder:
```php
$duplicate = DB::table('guitar_scores')
    ->where('type', 'file')
    ->where('path', $newPath)
    ->where('id', '!=', $id)  // Exclude current file
    ->first();

if ($duplicate) {
    $folderMsg = $file->parent_path ? "in folder '{$file->parent_path}'" : "in root folder";
    return back()->with('error', "⚠️ A file named '{$newName}' already exists {$folderMsg}...");
}
```

**Error message example:**
```
⚠️ A file named 'prelude1.pdf' already exists in folder 'Bach_Preludes'. 
Please choose a different name.
```

### 4. ✅ Show Folder Context in Edit Page

**File:** `edit.blade.php`

When editing a file, you now see where it's located:
```
Current Filename: prelude1.pdf

📁 Location: Bach_Preludes    ← Now shows folder!

.PDF | 2.5 MB | Dec 24, 2025
```

## How It Works:

### File Uniqueness:
Files are uniquely identified by their **full path**, not just filename:
- `prelude1.pdf` (root) → path = `"prelude1.pdf"`
- `Bach_Preludes/prelude1.pdf` → path = `"Bach_Preludes/prelude1.pdf"`
- `Chopin_Preludes/prelude1.pdf` → path = `"Chopin_Preludes/prelude1.pdf"`

These are three **different** files because they have different paths.

### Duplicate Check:
When you try to:
1. **Upload** a file → checks if `path` already exists
2. **Rename** a file → checks if new `path` already exists (excluding the file being renamed)

### Safe Operations:
You **CAN** have:
- ✅ `Bach_Preludes/prelude1.pdf`
- ✅ `Chopin_Preludes/prelude1.pdf`

You **CANNOT** have:
- ❌ Two files both at `Bach_Preludes/prelude1.pdf`
- ❌ Two files both at `prelude1.pdf` (root)

## Updated Files:

1. **GuitarScoreController.php**
   - Added `parent_path` to index query
   - Added duplicate check in `upload()` method
   - Added duplicate check in `update()` method
   - Updated `edit()` to fetch `parent_path`

2. **simple.blade.php**
   - Shows parent folder name for each file
   - Shows "Root folder" for files without parent

3. **edit.blade.php**
   - Shows location (folder or root) when editing
   - Added note about duplicate protection

## User Experience:

### Before:
```
prelude1.pdf              ← Which folder is this in??
prelude1.pdf              ← And this one??
```

### After:
```
prelude1.pdf
📁 Bach_Preludes          ← Clear!

prelude1.pdf
📁 Chopin_Preludes        ← Distinct!
```

### Error Prevention:
- Upload duplicate → **Blocked** with clear error message
- Rename to duplicate → **Blocked** with clear error message
- User always knows which folder each file is in

## Testing Checklist:

- [ ] File list shows parent folder for each file
- [ ] Try to upload a file that already exists → should get error
- [ ] Try to rename a file to a name that already exists in same folder → should get error
- [ ] Rename a file successfully → should see new name immediately
- [ ] Edit page shows which folder the file is in
- [ ] Can have same filename in different folders (that's OK!)

## Notes:

- Files in **root folder** (uploaded via the upload form) have `parent_path = NULL`
- Files in **sub-folders** have `parent_path = 'folder_name'`
- The `path` column contains the full path and is the unique identifier
- This system respects your existing folder structure from the database rebuild
