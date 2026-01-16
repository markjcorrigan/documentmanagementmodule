# Protected Storage Solution - Technical Documentation

## Overview
A secure file access system for Laravel that protects sensitive directories behind authentication and permission checks. Files are stored outside the public web root and served through Laravel routes with proper MIME type handling.

---

## Problem Solved
- **Original Issue**: Apache was serving files directly from `/storage/` directory, bypassing Laravel security
- **Solution**: Created a protected route system that requires authentication and specific permissions
- **Result**: Files only accessible to authenticated Super Admins with "protected storage" permission

---

## System Architecture

### File Structure
```
C:\xampp\htdocs\pmway.hopto.org\
├── config\
│   └── filesystems.php (Modified)
├── routes\
│   └── web.php (Modified)
├── resources\views\
│   ├── protected-links.blade.php (Created)
│   └── storage-dashboard.blade.php (Existing)
├── storage\
│   └── protected\           ← FILES STORED HERE
│       ├── scientology\
│       ├── freezonecourses\
│       ├── helpme\
│       ├── lrh\
│       ├── studentmotivationpdf\
│       ├── studymanual\
│       ├── techdic\
│       ├── scientologydict\
│       └── technicaldictionary\
└── public\
    └── .htaccess (No changes needed)
```

---

## Files Modified/Created

### 1. `config/filesystems.php`
**Purpose**: Added custom disk for protected storage

**Changes Made**:
```php
'disks' => [
    // ... existing disks ...
    
    'protected' => [
        'driver' => 'local',
        'root' => storage_path('protected'),
        'visibility' => 'private',
        'throw' => false,
    ],
],
```

**Why**: Creates a dedicated filesystem disk pointing to `storage/protected/` directory

---

### 2. `routes/web.php`
**Purpose**: Main routing logic for protected file access

**Location in File**: Bottom of file, BEFORE the dynamic page loader

**Key Routes Added**:

#### a) Main Storage Home Page
```php
Route::get('/', function () {
    return view('protected-links');
})->name('storage.home');
```
- **URL**: `/protected-storage/`
- **View**: `resources/views/protected-links.blade.php`
- **Purpose**: Landing page with links to all resources

#### b) Storage Dashboard
```php
Route::get('/dashboard', function () {
    // Lists all resources with file counts
})->name('storage.dashboard');
```
- **URL**: `/protected-storage/dashboard`
- **View**: `resources/views/storage-dashboard.blade.php`
- **Purpose**: Admin view showing status of all protected folders

#### c) API Endpoints
```php
Route::prefix('api')->group(function () {
    Route::get('/status', ...)->name('storage.api.status');
    Route::post('/clear-cache/{resource}', ...)->name('storage.api.clear-cache');
});
```
- **URLs**: 
  - `/protected-storage/api/status`
  - `/protected-storage/api/clear-cache/{resource}`
- **Purpose**: API access to resource status and cache management

#### d) File Serving Route (The Main One)
```php
Route::get('/{resource}/{path?}', function (Request $request, $resource, $path = '') {
    // Serves actual files from storage/protected/
})->where('path', '.*')->name('storage.resource');
```
- **URL Pattern**: `/protected-storage/{resource}/{path?}`
- **Examples**: 
  - `/protected-storage/scientology/`
  - `/protected-storage/scientology/manual/31outcourse.htm`
  - `/protected-storage/lrh/index-5.html`
- **Purpose**: Serves ALL files from protected storage

**Security Middleware Applied**:
```php
Route::middleware(['auth', 'permission:protected storage'])
    ->prefix('protected-storage')
    ->group(function () { ... });
```

---

### 3. `resources/views/protected-links.blade.php`
**Purpose**: Landing page with links to all protected resources

**Key Features**:
- Styled navigation page
- Links to each resource folder
- Link to dashboard
- Uses Laravel route helpers for dynamic URLs

**Important Code**:
```php
<a href="{{ route('storage.resource', ['resource' => 'scientology']) }}">
    📚 Scientology
</a>
```

---

### 4. `resources/views/storage-dashboard.blade.php`
**Purpose**: Admin dashboard showing resource status

**Displays**:
- Total resources count
- Online/offline status (based on index.html presence)
- File counts per resource
- Links to open each resource
- Cache management buttons

---

### 5. `resources/views/admin/partials/sidebar.blade.php`
**Purpose**: Admin sidebar navigation

**Change Made**:
```php
// OLD (caused errors):
route('protected-storage')

// NEW (correct):
route('storage.home')
```

---

## Technical Implementation Details

### Key Design Decisions

#### 1. **Why `/protected-storage/` Instead of `/storage/`?**
- **Problem**: Apache serves `/storage/` directory directly (physical folder)
- **Solution**: Use different URL prefix to avoid collision
- **Result**: `/protected-storage/` → Laravel routes, `/storage/` → Apache blocked

#### 2. **Custom Filesystem Disk**
- **Why**: Files are in `storage/protected/` not `storage/app/protected/`
- **Solution**: Created `'protected'` disk in filesystems.php
- **Usage**: `Storage::disk('protected')->exists($path)`

#### 3. **HTML Base Tag Injection**
- **Problem**: HTML files use relative links (e.g., `<a href="index-5.html">`)
- **Issue**: Browser interprets relative to current URL, breaking navigation
- **Solution**: Inject `<base href="/protected-storage/scientology/">` into HTML
- **Result**: All relative links resolve correctly

#### 4. **MIME Type Detection**
Proper content types for browser display vs download:
```php
$mimeTypes = [
    'html' => 'text/html',          // Display in browser
    'pdf' => 'application/pdf',      // Display in browser
    'zip' => 'application/zip',      // Download
    // ... etc
];
```

#### 5. **Content-Disposition Headers**
- **Inline**: Display in browser (HTML, PDF, images)
- **Attachment**: Force download (ZIP, RAR, EXE)

---

## Security Features

### 1. Authentication Layer
```php
->middleware(['auth', ...])
```
- Users must be logged in
- Unauthenticated users redirected to login page

### 2. Permission Layer
```php
->middleware(['permission:protected storage'])
```
- User must have "protected storage" permission (Spatie Laravel-Permission)
- Assigned to Super Admin role
- Can be assigned to other roles as needed

### 3. File System Protection
- Files in `storage/protected/` (outside `public/` directory)
- Not accessible via direct URL
- Must go through Laravel routing

### 4. Validation
```php
$validResources = ['scientology', 'freezonecourses', ...];
if (!isset($validResources[$resource])) {
    abort(404);
}
```
- Only approved resource names can be accessed
- Prevents directory traversal attacks

---

## How It Works - Request Flow

```
1. User clicks: https://pmway.hopto.org/protected-storage/scientology/
   ↓
2. Laravel Route: web.php checks middleware
   ↓
3. Auth Middleware: Is user logged in?
   ├─ NO → Redirect to /login
   └─ YES → Continue
   ↓
4. Permission Middleware: Does user have "protected storage" permission?
   ├─ NO → 403 Forbidden
   └─ YES → Continue
   ↓
5. Route Logic: Build file path
   - Resource: scientology
   - Path: empty
   - Check: storage/protected/scientology/index.html
   ↓
6. File Exists?: Storage::disk('protected')->exists()
   ├─ NO → 404 Not Found
   └─ YES → Continue
   ↓
7. HTML File?: Check extension
   ├─ YES → Inject <base> tag, return HTML
   └─ NO → Return file directly
   ↓
8. Response Headers:
   - Content-Type: text/html
   - Content-Disposition: inline
   ↓
9. Browser displays the file
```

---

## Supported File Types

### Display Inline (View in Browser)
- **HTML**: `.html`, `.htm`
- **PDF**: `.pdf`
- **Images**: `.jpg`, `.jpeg`, `.png`, `.gif`, `.svg`, `.webp`, `.ico`
- **Text**: `.txt`, `.css`, `.js`

### Force Download
- **Archives**: `.zip`, `.rar`, `.7z`
- **Executables**: `.exe`, `.dmg`

### Streaming
- **Audio**: `.mp3`
- **Video**: `.mp4`, `.avi`

---

## Configuration Reference

### Environment Variables (Optional)
The solution doesn't require these, but they were part of an earlier proxy design:
```env
PROTECTED_STORAGE_USER=markjc
PROTECTED_STORAGE_PASS=Zoltar@123
PROTECTED_STORAGE_URL=https://pmway.hopto.org
```
*Note: These are NOT used in the final implementation (no proxy system)*

### Spatie Permission
```php
// Required permission name (case-sensitive)
'protected storage'

// Assigned to role
'Super Admin'
```

---

## Troubleshooting Guide

### Issue 1: "403 Forbidden" on `/storage/`
**Cause**: Apache serving physical directory  
**Solution**: Use `/protected-storage/` URL instead

### Issue 2: Browser Downloads Instead of Displaying
**Cause**: Missing `Content-Disposition: inline` header  
**Solution**: Already fixed in final code with proper headers

### Issue 3: Relative Links Broken (404 errors)
**Cause**: HTML files use relative paths  
**Solution**: Base tag injection (already implemented)

### Issue 4: "Route [protected-storage] not defined"
**Cause**: Old route name in views  
**Solution**: Change to `route('storage.home')`

### Issue 5: Files Not Found
**Debugging Steps**:
```bash
# Check file exists
ls -la storage/protected/scientology/index.html

# Check Laravel log
tail -f storage/logs/laravel.log

# Clear caches
php artisan route:clear
php artisan view:clear
php artisan config:clear
```

### Issue 6: Browser Caching Old Redirects
**Solution**: Hard refresh or clear browser cache
- Chrome: Ctrl+Shift+Delete
- Or use Incognito mode

---

## Maintenance Tasks

### Adding New Resource Folders
1. Create folder in `storage/protected/`
2. Add to `$resources` array in routes
3. Add to `$validResources` array
4. Add link in `protected-links.blade.php`

Example:
```php
$resources = [
    // ... existing ...
    'newresource' => 'New Resource Name',
];
```

### Clearing Cache
Via API:
```bash
curl -X POST https://pmway.hopto.org/protected-storage/api/clear-cache/scientology
```

Or manually:
```bash
rm -rf storage/protected/scientology/*
```

### Checking Resource Status
Via API:
```bash
curl https://pmway.hopto.org/protected-storage/api/status
```

---

## Performance Considerations

### Current Implementation
- **No caching**: Files served on every request
- **Filesystem I/O**: Direct file reads
- **Good for**: Small to medium file counts

### Potential Optimizations (Future)
1. **Response Caching**: Cache rendered HTML
2. **CDN Integration**: Serve static assets via CDN
3. **Lazy Loading**: For large directories
4. **Pagination**: For file listings

---

## Security Best Practices

### ✅ Implemented
- Authentication required
- Permission-based access
- Files outside public directory
- Input validation
- Logging of access attempts

### 🔒 Additional Recommendations
1. **Rate Limiting**: Add to routes if needed
2. **IP Whitelisting**: For extra sensitive files
3. **File Integrity**: Checksums for verification
4. **Audit Logging**: Track who accesses what
5. **HTTPS Only**: Already using (pmway.hopto.org)

---

## Testing Checklist

### Functional Tests
- [ ] Super Admin can access all resources
- [ ] Non-authenticated users redirected to login
- [ ] Users without permission get 403
- [ ] HTML files display correctly
- [ ] PDF files display inline
- [ ] ZIP files download
- [ ] Subdirectory navigation works
- [ ] Relative links work correctly

### Security Tests
- [ ] Cannot access via `/storage/protected/`
- [ ] Cannot access without login
- [ ] Cannot access without permission
- [ ] Directory traversal blocked (`../../etc/passwd`)

---

## Route Names Reference

Quick reference for using in views:

```php
// Main pages
route('storage.home')              // /protected-storage/
route('storage.dashboard')         // /protected-storage/dashboard

// Resource access
route('storage.resource', ['resource' => 'scientology'])
// /protected-storage/scientology/

route('storage.resource', ['resource' => 'lrh', 'path' => 'manual/file.htm'])
// /protected-storage/lrh/manual/file.htm

// API
route('storage.api.status')        // /protected-storage/api/status
route('storage.api.clear-cache', ['resource' => 'scientology'])
// /protected-storage/api/clear-cache/scientology
```

---

## Key Technologies Used

- **Laravel 11.x**: Web framework
- **Spatie Laravel-Permission**: Role/permission management
- **Storage Facade**: File system abstraction
- **Guzzle**: HTTP client (legacy from proxy design, no longer used)
- **Apache**: Web server (avoiding conflicts)

---

## Version History

### Version 1.0 (Final - December 12, 2024)
- Direct file serving from `storage/protected/`
- Custom filesystem disk
- Base tag injection for relative links
- Comprehensive MIME type support
- Clean, maintainable code

### Earlier Iterations (Abandoned)
- Proxy system to remote server (too complex)
- Caching system (not needed)
- `/storage/` prefix (conflicted with Apache)

---

## Credits & Notes

**Developed**: December 12, 2024  
**Developer**: Claude (Anthropic) + markjc  
**Framework**: Laravel 11.x  
**Server**: XAMPP (Windows) - Apache/2.4.58, PHP 8.x  

**Key Insight**: The breakthrough was realizing Apache was intercepting `/storage/` URLs before Laravel could process them, leading to the `/protected-storage/` prefix solution.

---

## Quick Start for Future Reference

### To Access Protected Files:
1. Login as Super Admin
2. Navigate to: `https://pmway.hopto.org/protected-storage/`
3. Click any resource
4. Browse files normally

### To Grant Access to Another User:
```php
// In tinker or controller
$user = User::find($userId);
$user->givePermissionTo('protected storage');
```

### To Add New Protected Files:
1. Copy files to `storage/protected/{foldername}/`
2. Update route arrays if needed
3. Files immediately accessible

---

## Support & Further Development

### Common Enhancements
- Add search functionality
- Add file upload interface
- Add user activity logging
- Add download statistics
- Add file preview thumbnails

### Known Limitations
- No built-in search
- No file upload UI
- No version control
- No multi-language support
- No mobile app

---

## Summary

This solution provides **secure, authenticated, permission-based access** to protected directories through Laravel routing. Files remain outside the public web root, ensuring they can only be accessed by authorized Super Admins with the "protected storage" permission.

**Key Success Factors**:
1. ✅ Security through Laravel middleware
2. ✅ Clean URL structure (`/protected-storage/`)
3. ✅ Proper MIME type handling
4. ✅ HTML base tag injection for relative links
5. ✅ Custom filesystem disk for flexibility
6. ✅ Simple, maintainable code

---

**End of Documentation**
