# Classical Guitar Scores System - Integration Guide

## 📚 Overview

This system adds **classical guitar scores management** to your Laravel application, following the EXACT same pattern as your existing Protected Storage system.

**Key Features:**
- ✅ Separate folder: `storage/app/protectedGuitar/`
- ✅ Dedicated table: `guitar_scores`
- ✅ Search by: Composer, Title, Performer
- ✅ Operations: Upload, Edit, Delete, Search, Download
- ✅ Same security pattern: Authentication + Permission
- ✅ TrueMirror integration ready

---

## 🚀 Installation Steps

### Step 1: Create the Database Table

Copy the migration file:
```bash
# Copy to:
database/migrations/2025_12_23_000001_create_guitar_scores_table.php
```

Run migration:
```bash
php artisan migrate
```

---

### Step 2: Create the Model

Copy `GuitarScore.php` to:
```
app/Models/GuitarScore.php
```

---

### Step 3: Create the Controller

Copy `GuitarScoreController.php` to:
```
app/Http/Controllers/GuitarScoreController.php
```

---

### Step 4: Add Filesystem Disk

Open `config/filesystems.php` and add the `protectedGuitar` disk:

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

### Step 5: Add Routes

Open `routes/web.php` and add the guitar scores routes BEFORE the dynamic page loader (same location as protected storage routes):

```php
// Guitar Scores Protected Routes
Route::middleware(['auth', 'permission:guitar scores'])
    ->prefix('guitar-scores')
    ->group(function () {
        
        // Main landing page
        Route::get('/', [App\Http\Controllers\GuitarScoreController::class, 'index'])
            ->name('guitar.index');
        
        // Browse/search page
        Route::get('/browse', [App\Http\Controllers\GuitarScoreController::class, 'browse'])
            ->name('guitar.browse');
        
        // Upload form
        Route::get('/upload', [App\Http\Controllers\GuitarScoreController::class, 'create'])
            ->name('guitar.create');
        
        // Store uploaded file
        Route::post('/upload', [App\Http\Controllers\GuitarScoreController::class, 'store'])
            ->name('guitar.store');
        
        // Edit form
        Route::get('/{score}/edit', [App\Http\Controllers\GuitarScoreController::class, 'edit'])
            ->name('guitar.edit');
        
        // Update metadata
        Route::put('/{score}', [App\Http\Controllers\GuitarScoreController::class, 'update'])
            ->name('guitar.update');
        
        // Delete
        Route::delete('/{score}', [App\Http\Controllers\GuitarScoreController::class, 'destroy'])
            ->name('guitar.destroy');
        
        // Download
        Route::get('/{score}/download', [App\Http\Controllers\GuitarScoreController::class, 'download'])
            ->name('guitar.download');
        
        // API endpoints
        Route::prefix('api')->group(function () {
            Route::get('/stats', [App\Http\Controllers\GuitarScoreController::class, 'apiStats'])
                ->name('guitar.api.stats');
            
            Route::get('/search', [App\Http\Controllers\GuitarScoreController::class, 'apiSearch'])
                ->name('guitar.api.search');
        });
        
        // File serving route (must be last)
        Route::get('/{path?}', [App\Http\Controllers\GuitarScoreController::class, 'serve'])
            ->where('path', '.*')
            ->name('guitar.serve');
    });
```

---

### Step 6: Create the Permission

Run in tinker or a seeder:

```bash
php artisan tinker
```

```php
// Create the permission
\Spatie\Permission\Models\Permission::create(['name' => 'guitar scores']);

// Assign to Super Admin role
$superAdminRole = \Spatie\Permission\Models\Role::where('name', 'Super Admin')->first();
$superAdminRole->givePermissionTo('guitar scores');

// Or assign to a specific user
$user = \App\Models\User::find(1);
$user->givePermissionTo('guitar scores');
```

---

### Step 7: Update SetupSystemConfidential Command

Open `app/Console/Commands/SetupSystemConfidential.php` and make these additions:

#### 7a. Update the signature (line ~27):
```php
protected $signature = 'system:setup-confidential {--skip-protected : Skip protected storage sync} {--skip-guitar : Skip guitar scores sync}';
```

#### 7b. Add to configuration questions (~line 82):
```php
$rebuildGuitarScores = $this->confirm('Rebuild Guitar Scores table?', false);
```

#### 7c. Add to summary display (~line 90):
```php
$this->info('   Rebuild Guitar Scores: ' . ($rebuildGuitarScores ? '✅ Yes' : '❌ No'));
```

#### 7d. Add to fresh setup logic (~line 71):
```php
if ($freshSetup) {
    $rebuildDocs = true;
    $rebuildImages = true;
    $rebuildProtected = true;
    $rebuildGuitarScores = true;  // ADD THIS
```

#### 7e. Add the sync section after protected storage sync (~line 704):

See the complete code in `setup_command_additions.php`

#### 7f. Add the three new methods at the end of the class:
- `syncGuitarScores()`
- `syncGuitarDirectory()`
- `syncGuitarFile()`

Complete code in `setup_command_additions.php`

---

### Step 8: Create the Folder

```bash
# Create the guitar scores folder
mkdir storage/app/protectedGuitar
chmod 755 storage/app/protectedGuitar
```

---

### Step 9: Create Basic Views (Optional but Recommended)

Create these view files:

#### `resources/views/guitar-scores/index.blade.php`
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>🎸 Classical Guitar Scores</h1>
    
    <div class="card">
        <div class="card-body">
            <h3>Library Statistics</h3>
            <ul>
                <li>Total Files: {{ $stats['total_files'] }}</li>
                <li>Total Folders: {{ $stats['total_folders'] }}</li>
                <li>Composers: {{ $stats['composers_count'] }}</li>
                <li>Performers: {{ $stats['performers_count'] }}</li>
            </ul>
            
            <div class="mt-3">
                <a href="{{ route('guitar.browse') }}" class="btn btn-primary">Browse Scores</a>
                <a href="{{ route('guitar.create') }}" class="btn btn-success">Upload Score</a>
            </div>
        </div>
    </div>
</div>
@endsection
```

#### `resources/views/guitar-scores/browse.blade.php`
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Browse Guitar Scores</h1>
    
    <!-- Search Form -->
    <form method="GET" action="{{ route('guitar.browse') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" 
                       placeholder="Search..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="composer" class="form-control">
                    <option value="">All Composers</option>
                    @foreach($composers as $composer)
                        <option value="{{ $composer }}" 
                                {{ request('composer') == $composer ? 'selected' : '' }}>
                            {{ $composer }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="performer" class="form-control">
                    <option value="">All Performers</option>
                    @foreach($performers as $performer)
                        <option value="{{ $performer }}" 
                                {{ request('performer') == $performer ? 'selected' : '' }}>
                            {{ $performer }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    
    <!-- Results Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Composer</th>
                <th>Performer</th>
                <th>Size</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{ $score->title ?: $score->name }}</td>
                <td>{{ $score->composer }}</td>
                <td>{{ $score->performer }}</td>
                <td>{{ $score->human_size }}</td>
                <td>
                    <a href="{{ route('guitar.download', $score) }}" class="btn btn-sm btn-primary">Download</a>
                    <a href="{{ route('guitar.edit', $score) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('guitar.destroy', $score) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Delete this score?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $scores->links() }}
</div>
@endsection
```

#### `resources/views/guitar-scores/upload.blade.php`
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload Guitar Score</h1>
    
    <form method="POST" action="{{ route('guitar.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>File</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Composer</label>
            <input type="text" name="composer" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Performer</label>
            <input type="text" name="performer" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Notes</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label>Folder (optional)</label>
            <input type="text" name="folder" class="form-control" placeholder="e.g., Bach">
        </div>
        
        <button type="submit" class="btn btn-success">Upload</button>
        <a href="{{ route('guitar.browse') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
```

---

## 📖 Usage Examples

### Uploading Files Manually

You can also upload files directly via filesystem:

```bash
# Copy files to the folder
cp ~/guitar-scores/bach-prelude.pdf storage/app/protectedGuitar/

# Then sync the database
php artisan system:setup-confidential
# Choose "yes" for Guitar Scores rebuild
```

---

### Searching Programmatically

```php
// Search for Bach scores
$bachScores = GuitarScore::search('bach')->files()->get();

// Get all scores by a specific performer
$scores = GuitarScore::byPerformer('John Williams')->get();

// Find a specific title
$score = GuitarScore::where('title', 'LIKE', '%Prelude%')->first();

// Get all composers
$composers = GuitarScore::getComposers();
```

---

### API Endpoints

```bash
# Get statistics
curl https://pmway.hopto.org/guitar-scores/api/stats

# Search
curl "https://pmway.hopto.org/guitar-scores/api/search?search=bach"
```

---

## 🔄 TrueMirror Integration

### Update TrueMirror Script

Add these tracking variables after line 66 in `TRUEMIRROR_PROD-Improved-2D.ps1`:

```powershell
# ===================== GUITAR SCORES TRACKING =====================
$guitarScoresPath = "storage\app\protectedGuitar"
$script:addedGuitarFiles = @()
$script:deletedGuitarFiles = @()
$script:updatedGuitarFiles = @()
```

### Track Changes

Inside the file copying loop, add guitar tracking:

```powershell
# Track whether this was an add or update
if ($isUpdate) {
    $script:updatedFiles += $relativePath
    
    # Track guitar files separately
    if ($relativePath -like "*$guitarScoresPath*") {
        $script:updatedGuitarFiles += $relativePath
    }
} else {
    $script:addedFiles += $relativePath
    
    # Track guitar files separately
    if ($relativePath -like "*$guitarScoresPath*") {
        $script:addedGuitarFiles += $relativePath
    }
}
```

### Generate Guitar Scores Report

Add before "Press ENTER to exit":

```powershell
# ===================== GUITAR SCORES REPORT =====================
Log-Header "GUITAR SCORES TRACKING"

$guitarReportFile = Join-Path $reportsFolder "GuitarScores_$reportDate.txt"

$totalGuitarChanged = $script:addedGuitarFiles.Count + 
                      $script:updatedGuitarFiles.Count + 
                      $script:deletedGuitarFiles.Count

if ($totalGuitarChanged -gt 0) {
    Log "`nGuitar Scores Summary:" "Cyan"
    Log "  Files Added: $($script:addedGuitarFiles.Count)" $(if($script:addedGuitarFiles.Count -gt 0){"Green"}else{"Gray"})
    Log "  Files Updated: $($script:updatedGuitarFiles.Count)" $(if($script:updatedGuitarFiles.Count -gt 0){"Yellow"}else{"Gray"})
    Log "  Files Deleted: $($script:deletedGuitarFiles.Count)" $(if($script:deletedGuitarFiles.Count -gt 0){"Red"}else{"Gray"})
    
    # Create detailed report
    $guitarReportContent = @"
================================================================================
GUITAR SCORES MIRROR REPORT
================================================================================
Generated: $(Get-Date -Format "yyyy-MM-dd HH:mm:ss")
Total Changed: $totalGuitarChanged

ADDED FILES ($($script:addedGuitarFiles.Count)):
$($script:addedGuitarFiles -join "`n")

UPDATED FILES ($($script:updatedGuitarFiles.Count)):
$($script:updatedGuitarFiles -join "`n")

DELETED FILES ($($script:deletedGuitarFiles.Count)):
$($script:deletedGuitarFiles -join "`n")
================================================================================
"@
    
    $guitarReportContent | Out-File $guitarReportFile -Encoding UTF8
    Log "Guitar Scores Report: $guitarReportFile" "Cyan"
} else {
    Log "`nGuitar Scores: No changes detected" "Gray"
}
```

### Sync After Mirror

After TrueMirror completes:

```bash
cd C:\xampp\htdocs\pmway.hopto.org
php artisan system:setup-confidential
# Choose "yes" for Guitar Scores rebuild
```

---

## 🎯 URL Structure

Following the same pattern as Protected Storage:

```
Main Page:     /guitar-scores/
Browse/Search: /guitar-scores/browse
Upload:        /guitar-scores/upload
Edit:          /guitar-scores/{id}/edit
Download:      /guitar-scores/{id}/download
Serve File:    /guitar-scores/{path}
API Stats:     /guitar-scores/api/stats
API Search:    /guitar-scores/api/search
```

---

## 🔒 Security

Same as Protected Storage:
- ✅ Authentication required
- ✅ Permission required: `guitar scores`
- ✅ Files outside public directory
- ✅ Served through Laravel routes
- ✅ HTTPS only

---

## 📁 Folder Organization

Recommended structure:

```
storage/app/protectedGuitar/
├── Bach/
│   ├── Prelude in D Minor.pdf
│   └── Cello Suite No 1.pdf
├── Sor/
│   ├── Studies Op 6.pdf
│   └── Grand Solo Op 14.pdf
└── Tarrega/
    └── Recuerdos de la Alhambra.pdf
```

---

## ✅ Testing Checklist

- [ ] Migration runs successfully
- [ ] Permission created and assigned
- [ ] Can access `/guitar-scores/` (logged in with permission)
- [ ] Cannot access without login (redirects to login)
- [ ] Cannot access without permission (403 error)
- [ ] Upload works
- [ ] Search works
- [ ] Edit works
- [ ] Delete works
- [ ] Download works
- [ ] TrueMirror tracking works
- [ ] Database sync works

---

## 🎼 Quick Start Workflow

1. **Setup** (one time):
   ```bash
   php artisan migrate
   php artisan tinker
   # Create permission and assign to your user
   ```

2. **Add Files**:
   - Copy PDFs to `storage/app/protectedGuitar/`
   - Or use the upload form at `/guitar-scores/upload`

3. **Sync Database**:
   ```bash
   php artisan system:setup-confidential
   # Choose "yes" for Guitar Scores
   ```

4. **Browse & Search**:
   - Visit: `/guitar-scores/browse`
   - Search by composer, title, or performer

5. **Mirror with TrueMirror**:
   - Run TrueMirror script
   - Check guitar scores report
   - Sync database again if needed

---

## 🆚 Differences from Protected Storage

| Feature | Protected Storage | Guitar Scores |
|---------|------------------|---------------|
| **Folder** | `storage/protected/` | `storage/app/protectedGuitar/` |
| **Table** | `protected_files` | `guitar_scores` |
| **URL** | `/protected-storage/` | `/guitar-scores/` |
| **Permission** | `protected storage` | `guitar scores` |
| **Metadata** | resource only | composer, title, performer, notes |
| **Operations** | Browse only | Upload, Edit, Delete, Browse |
| **Disk** | `protected` | `protectedGuitar` |

---

## 🔧 Troubleshooting

### Files not showing up?
```bash
# Resync the database
php artisan system:setup-confidential
```

### Permission denied?
```php
// In tinker:
$user = User::find(YOUR_USER_ID);
$user->givePermissionTo('guitar scores');
```

### Folder doesn't exist?
```bash
mkdir -p storage/app/protectedGuitar
chmod 755 storage/app/protectedGuitar
```

---

## 📚 Summary

You now have a complete guitar scores management system that:
- ✅ Follows your existing Protected Storage architecture
- ✅ Has its own dedicated table and folder
- ✅ Supports upload, edit, delete, search, download
- ✅ Integrates with TrueMirror for change tracking
- ✅ Is searchable by composer, title, and performer
- ✅ Uses the same security model (auth + permission)
- ✅ Can sync filesystem to database on demand

The system is completely separate from Protected Storage but follows the exact same patterns, making it easy to maintain and understand!
