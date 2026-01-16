# Navigation Bar Updates

## What Changed:

### ✅ Removed
- **Portfolio Admin button** - Removed from all navigation bars (functionality handled by Admin button)

### ✅ Added  
- **Files ↔ Folders Toggle** - Context-aware navigation button:
  - **In File views** (simple, edit, player): Shows "📁 Folders" button → links to folder list
  - **In Folder views** (folders/index, show, edit): Shows "📄 Files" button → links to file list

### ✅ Updated
- **Sun Icon** - Now yellow (`text-yellow-400`) for better visibility
- **Dark Mode Storage** - Now writes to BOTH localStorage keys for site-wide sync:
  - `theme` (your main site key)
  - `flux:appearance` (flux framework key)

## Updated Files:

### File System Views:
1. **simple.blade.php** - File list page
2. **edit.blade.php** - File edit/rename page  
3. **player.blade.php** - Audio/video player page

### Folder System Views:
4. **folders_index.blade.php** - Folder list page
5. **folders_show.blade.php** - View files in folder page
6. **folders_edit.blade.php** - Folder rename page

## Navigation Structure:

### File System Pages (simple, edit, player):
```
[Home] [Admin] [📁 Folders] ...................... [🌙/☀️]
```

### Folder System Pages (folders/*):
```
[Home] [Admin] [📄 Files] ........................ [🌙/☀️]
```

## Dark Mode Sync

The dark mode toggle now syncs across your entire pmway site:

```javascript
// Reads from BOTH keys
const isDark = localStorage.getItem('theme') === 'dark' || 
              localStorage.getItem('flux:appearance') === 'dark';

// Writes to BOTH keys
localStorage.setItem('theme', 'dark');
localStorage.setItem('flux:appearance', 'dark');
```

This ensures that:
- Changing dark mode in the guitar system updates the entire site
- Changing dark mode elsewhere in the site updates the guitar system
- Uses your existing `theme` key
- Also writes to `flux:appearance` for flux framework compatibility

## User Experience:

1. **Seamless Navigation**: Users can easily switch between Files and Folders views
2. **Consistent Theme**: Dark/light mode persists across entire pmway site
3. **Clean Interface**: Removed redundant Portfolio Admin button
4. **Visual Clarity**: Yellow sun icon is more visible and friendly

## Testing:

After deployment, test:
- [ ] Click "📁 Folders" button in file list → should go to folder list
- [ ] Click "📄 Files" button in folder list → should go to file list
- [ ] Toggle dark mode in guitar system → check if main site also changes
- [ ] Toggle dark mode in main site → check if guitar system also changes
- [ ] Verify sun icon is yellow
- [ ] Check all pages have consistent navigation
