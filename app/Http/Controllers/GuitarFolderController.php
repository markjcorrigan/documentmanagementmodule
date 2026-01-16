<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; // <-- ADD THIS

class GuitarFolderController extends Controller
{
    /**
     * List all folders with search
     */
    public function index(Request $request)
    {
        $query = DB::table('guitar_scores')
            ->where('type', 'folder')
            ->select(['id', 'name', 'path', 'parent_path', 'created_at', 'updated_at']);

        if ($request->has('search') && !empty($searchTerm = trim($request->search))) {
            $query->where('name', 'like', "%{$searchTerm}%");
        }

        $folders = $query->orderBy('name', 'asc')->paginate(50);

        // Count files in each folder
        $folders->getCollection()->transform(function ($folder) {
            $fileCount = DB::table('guitar_scores')
                ->where('type', 'file')
                ->where('parent_path', $folder->path)
                ->count();
            $folder->file_count = $fileCount;
            return $folder;
        });

        return view('protectedguitar.folders.index', compact('folders'));
    }

    /**
     * Show files inside a specific folder
     */
    public function show($id)
    {
        $folder = DB::table('guitar_scores')->where('id', $id)->where('type', 'folder')->first();

        if (!$folder) {
            return redirect()->route('guitar.folders.index')->with('error', "Folder ID {$id} not found");
        }

        // OPTIONAL: Uncomment to scan folder on-demand when viewing
        // $this->scanSingleFolder($folder->path);

        // Get subfolders within this folder
        $subfolders = DB::table('guitar_scores')
            ->where('type', 'folder')
            ->where('parent_path', $folder->path)
            ->select(['id', 'name', 'path', 'parent_path'])
            ->orderBy('name', 'asc')
            ->get();

        // Count files in each subfolder
        $subfolders->transform(function ($subfolder) {
            $fileCount = DB::table('guitar_scores')
                ->where('type', 'file')
                ->where('parent_path', $subfolder->path)
                ->count();
            $subfolder->file_count = $fileCount;
            return $subfolder;
        });

        // Get files directly in this folder
        $files = DB::table('guitar_scores')
            ->where('type', 'file')
            ->where('parent_path', $folder->path)
            ->whereIn('extension', ['mp3', 'mp4', 'pdf', 'jpg', 'jpeg', 'png'])
            ->select(['id', 'name', 'path', 'extension', 'size', 'file_modified_at'])
            ->orderBy('name', 'asc')
            ->get();

        // Convert file_modified_at to Carbon
        $files->transform(function ($file) {
            $file->file_modified_at = \Carbon\Carbon::parse($file->file_modified_at);
            return $file;
        });

        return view('protectedguitar.folders.show', compact('folder', 'subfolders', 'files'));
    }

    /**
     * Scan a single folder on-demand (NEW METHOD)
     */
    private function scanSingleFolder($folderPath)
    {
        try {
            $disk = Storage::disk('protectedGuitar');

            // Handle root folder (empty path)
            $scanPath = $folderPath === null ? '' : $folderPath;

            // Get items directly in this folder only
            $items = $disk->files($scanPath);
            $subdirs = $disk->directories($scanPath);

            $newItems = 0;

            // Add subfolders
            foreach ($subdirs as $subdir) {
                $existing = DB::table('guitar_scores')
                    ->where('path', $subdir)
                    ->where('type', 'folder')
                    ->first();

                if (!$existing) {
                    DB::table('guitar_scores')->insert([
                        'name' => basename($subdir),
                        'path' => $subdir,
                        'parent_path' => $folderPath,
                        'type' => 'folder',
                        'file_modified_at' => now(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $newItems++;
                    Log::info("Added new folder: {$subdir}");
                }
            }

            // Add files
            foreach ($items as $file) {
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                // Skip non-relevant file types
                if (!in_array($extension, ['mp3', 'mp4', 'pdf', 'jpg', 'jpeg', 'png', 'gif'])) {
                    continue;
                }

                $existing = DB::table('guitar_scores')
                    ->where('path', $file)
                    ->where('type', 'file')
                    ->first();

                if (!$existing) {
                    $size = $disk->size($file);
                    $mimeTypes = \App\Models\GuitarScore::mimeTypes();
                    $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

                    DB::table('guitar_scores')->insert([
                        'name' => basename($file),
                        'path' => $file,
                        'parent_path' => $folderPath,
                        'type' => 'file',
                        'extension' => $extension,
                        'mime_type' => $mimeType,
                        'size' => $size,
                        'file_modified_at' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($file)),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $newItems++;
                    Log::info("Added new file: {$file}");
                }
            }

            return $newItems;

        } catch (\Exception $e) {
            Log::error("Failed to scan folder {$folderPath}: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Manually trigger folder scan (NEW METHOD)
     */
    public function scan(Request $request, $id)
    {
        $folder = DB::table('guitar_scores')->where('id', $id)->where('type', 'folder')->first();

        if (!$folder) {
            return back()->with('error', "Folder not found");
        }

        $count = $this->scanSingleFolder($folder->path);

        if ($count > 0) {
            return back()->with('success', "✅ Scanned folder '{$folder->name}'. Found {$count} new items.");
        } else {
            return back()->with('info', "ℹ️  Folder '{$folder->name}' scanned. No new items found.");
        }
    }

    /**
     * Create a new folder
     */
    public function create()
    {
        return view('protectedguitar.folders.create');
    }

    /**
     * Store a new folder
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folderName = $request->name;
        $folderPath = $folderName;
        $diskPath = storage_path('protectedGuitar/' . $folderPath);

        // Create folder on disk
        if (File::exists($diskPath)) {
            return back()->with('error', 'Folder already exists on disk');
        }

        if (!File::makeDirectory($diskPath, 0755, true)) {
            return back()->with('error', 'Failed to create folder on disk');
        }

        // Add to database
        DB::table('guitar_scores')->insert([
            'name' => $folderName,
            'path' => $folderPath,
            'parent_path' => null,
            'type' => 'folder',
            'extension' => null,
            'mime_type' => null,
            'size' => null,
            'file_modified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('guitar.folders.index', ['search' => $folderName])
            ->with('success', "✅ Folder '{$folderName}' created successfully");
    }

    /**
     * Show edit form for folder
     */
    public function edit($id)
    {
        $folder = DB::table('guitar_scores')->where('id', $id)->where('type', 'folder')->first();

        if (!$folder) {
            return redirect()->route('guitar.folders.index')->with('error', "Folder ID {$id} not found");
        }

        // Count files in folder
        $fileCount = DB::table('guitar_scores')
            ->where('type', 'file')
            ->where('parent_path', $folder->path)
            ->count();

        $folder->file_count = $fileCount;

        return view('protectedguitar.folders.edit', compact('folder'));
    }

    /**
     * Update (rename) folder
     */
    public function update(Request $request, $id)
    {
        $folder = DB::table('guitar_scores')->where('id', $id)->where('type', 'folder')->first();

        if (!$folder) {
            return redirect()->route('guitar.folders.index')->with('error', "Folder ID {$id} not found");
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $newName = $request->name;
        $oldPath = storage_path('protectedGuitar/' . $folder->path);
        $newPath = $newName;
        $newFullPath = storage_path('protectedGuitar/' . $newPath);

        // Rename folder on disk
        if (File::exists($oldPath)) {
            if (!File::move($oldPath, $newFullPath)) {
                return back()->with('error', 'Failed to rename folder on disk');
            }
        } else {
            return back()->with('error', 'Original folder not found on disk: ' . $folder->path);
        }

        // Update folder record in database
        DB::table('guitar_scores')
            ->where('id', $id)
            ->update([
                'name' => $newName,
                'path' => $newPath,
                'updated_at' => now(),
            ]);

        // Update all files inside this folder (their parent_path needs to change)
        DB::table('guitar_scores')
            ->where('type', 'file')
            ->where('parent_path', $folder->path)
            ->update([
                'parent_path' => $newPath,
                'updated_at' => now(),
            ]);

        return redirect()->route('guitar.folders.index', ['search' => $newName])
            ->with('success', "✅ Folder renamed: '{$folder->name}' → '{$newName}' (files updated)");
    }

    /**
     * Delete folder and optionally its files
     */
    public function destroy(Request $request, $id)
    {
        $folder = DB::table('guitar_scores')->where('id', $id)->where('type', 'folder')->first();

        if (!$folder) {
            return back()->with('error', "Folder ID {$id} not found");
        }

        $folderPath = storage_path('protectedGuitar/' . $folder->path);

        // Get all files in this folder
        $files = DB::table('guitar_scores')
            ->where('type', 'file')
            ->where('parent_path', $folder->path)
            ->get();

        $fileCount = $files->count();

        // Delete folder and all files from disk
        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
        }

        // Delete folder from database
        DB::table('guitar_scores')->where('id', $id)->delete();

        // Delete all file records from database
        DB::table('guitar_scores')
            ->where('type', 'file')
            ->where('parent_path', $folder->path)
            ->delete();

        return redirect()->route('guitar.folders.index')
            ->with('success', "✅ Folder '{$folder->name}' deleted (including {$fileCount} files)");
    }
}