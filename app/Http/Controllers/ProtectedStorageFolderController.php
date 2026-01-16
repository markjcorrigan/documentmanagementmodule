<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProtectedStorageFolderController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('protected_files')
            ->where('type', 'folder')
            ->whereNull('parent_path'); // Only root-level folders

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('path', 'like', "%{$search}%");
            });
        }

        // Filter by resource
        if ($request->has('resource') && $request->resource) {
            $query->where('resource', $request->resource);
        }

        $folders = $query->orderBy('name')->paginate(50);

        // Get file and subfolder counts for each folder
        foreach ($folders as $folder) {
            $folder->file_count = DB::table('protected_files')
                ->where('parent_path', $folder->path)
                ->where('type', 'file')
                ->count();
            
            $folder->subfolder_count = DB::table('protected_files')
                ->where('parent_path', $folder->path)
                ->where('type', 'folder')
                ->count();
        }

        return view('protected.folders.index', compact('folders'));
    }

    public function show($id)
    {
        $folder = DB::table('protected_files')
            ->where('id', $id)
            ->where('type', 'folder')
            ->first();

        if (!$folder) {
            abort(404, 'Folder not found');
        }

        // Get files in this folder
        $files = DB::table('protected_files')
            ->where('parent_path', $folder->path)
            ->where('type', 'file')
            ->orderBy('name')
            ->get();

        // Get subfolders
        $subfolders = DB::table('protected_files')
            ->where('parent_path', $folder->path)
            ->where('type', 'folder')
            ->orderBy('name')
            ->get();

        // Get parent folder for breadcrumb
        $parentFolder = null;
        if ($folder->parent_path) {
            $parentFolder = DB::table('protected_files')
                ->where('path', $folder->parent_path)
                ->where('type', 'folder')
                ->first();
        }

        return view('protected.folders.show', compact('folder', 'files', 'subfolders', 'parentFolder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_path' => 'nullable|string',
        ]);

        $name = $request->input('name');
        $parentPath = $request->input('parent_path');
        
        // Calculate full path
        if ($parentPath) {
            $path = $parentPath . '/' . $name;
        } else {
            $path = $name;
        }

        // Create folder on disk
        $disk = Storage::disk('protected');
        $disk->makeDirectory($path);

        // Extract resource (top-level folder)
        $resource = null;
        if (strpos($path, '/') !== false) {
            $resource = explode('/', $path)[0];
        } else {
            $resource = $path;
        }

        // Insert into database
        DB::table('protected_files')->insert([
            'name' => $name,
            'path' => $path,
            'parent_path' => $parentPath,
            'type' => 'folder',
            'extension' => null,
            'mime_type' => null,
            'size' => 0,
            'resource' => $resource,
            'file_modified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Folder created successfully!');
    }

    public function edit($id)
    {
        $folder = DB::table('protected_files')
            ->where('id', $id)
            ->where('type', 'folder')
            ->first();

        if (!$folder) {
            abort(404, 'Folder not found');
        }

        return view('protected.folders.edit', compact('folder'));
    }

    public function update(Request $request, $id)
    {
        $folder = DB::table('protected_files')
            ->where('id', $id)
            ->where('type', 'folder')
            ->first();

        if (!$folder) {
            abort(404, 'Folder not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $disk = Storage::disk('protected');
        $oldPath = $folder->path;
        $newName = $request->input('name');
        
        // Calculate new path
        if ($folder->parent_path) {
            $newPath = $folder->parent_path . '/' . $newName;
        } else {
            $newPath = $newName;
        }

        // Rename folder on disk if name changed
        if ($oldPath !== $newPath) {
            if ($disk->exists($oldPath)) {
                $disk->move($oldPath, $newPath);
            }

            // Update all child files and folders
            $this->updateChildPaths($oldPath, $newPath);
        }

        // Update database
        DB::table('protected_files')
            ->where('id', $id)
            ->update([
                'name' => $newName,
                'path' => $newPath,
                'description' => $request->input('description'),
                'updated_at' => now(),
            ]);

        return redirect()->route('protectedstorage.folders.index')->with('success', 'Folder updated successfully!');
    }

    public function destroy($id)
    {
        $folder = DB::table('protected_files')
            ->where('id', $id)
            ->where('type', 'folder')
            ->first();

        if (!$folder) {
            abort(404, 'Folder not found');
        }

        $disk = Storage::disk('protected');

        // Delete from disk
        if ($disk->exists($folder->path)) {
            $disk->deleteDirectory($folder->path);
        }

        // Delete folder and all children from database
        DB::table('protected_files')->where('id', $id)->delete();
        DB::table('protected_files')->where('path', 'like', $folder->path . '/%')->delete();

        return redirect()->back()->with('success', 'Folder deleted successfully!');
    }

    public function scan($id)
    {
        $folder = DB::table('protected_files')
            ->where('id', $id)
            ->where('type', 'folder')
            ->first();

        if (!$folder) {
            abort(404, 'Folder not found');
        }

        $disk = Storage::disk('protected');
        
        if (!$disk->exists($folder->path)) {
            return redirect()->back()->with('error', 'Folder not found on disk');
        }

        // Scan this folder recursively
        $this->scanDirectory($folder->path, $disk);

        return redirect()->back()->with('success', 'Folder scanned successfully!');
    }

    private function scanDirectory($path, $disk)
    {
        // Get all items in this directory
        $contents = $disk->listContents($path, false);

        foreach ($contents as $item) {
            $itemPath = $item['path'];
            
            // Check if already in database
            $exists = DB::table('protected_files')->where('path', $itemPath)->exists();
            
            if (!$exists) {
                if ($item['type'] === 'dir') {
                    $this->syncDirectory($itemPath, $disk);
                    // Recursively scan subdirectories
                    $this->scanDirectory($itemPath, $disk);
                } else {
                    $this->syncFile($itemPath, $disk);
                }
            }
        }
    }

    private function syncDirectory($path, $disk)
    {
        $name = basename($path);
        $parentPath = dirname($path);
        
        if ($parentPath === '.' || $parentPath === '' || $parentPath === $path) {
            $parentPath = null;
        }

        // Extract resource (top-level folder)
        $resource = null;
        if (strpos($path, '/') !== false) {
            $resource = explode('/', $path)[0];
        } else {
            $resource = $path;
        }

        DB::table('protected_files')->insert([
            'name' => $name,
            'path' => $path,
            'parent_path' => $parentPath,
            'type' => 'folder',
            'extension' => null,
            'mime_type' => null,
            'size' => 0,
            'resource' => $resource,
            'file_modified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function syncFile($path, $disk)
    {
        $name = basename($path);
        $parentPath = dirname($path);
        
        if ($parentPath === '.' || $parentPath === '' || $parentPath === $path) {
            $parentPath = null;
        }

        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $size = $disk->size($path);

        $mimeTypes = [
            'mp3' => 'audio/mpeg',
            'mp4' => 'video/mp4',
            'pdf' => 'application/pdf',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'txt' => 'text/plain',
            'zip' => 'application/zip',
        ];
        
        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

        // Extract resource (top-level folder)
        $resource = null;
        if (strpos($path, '/') !== false) {
            $resource = explode('/', $path)[0];
        }

        DB::table('protected_files')->insert([
            'name' => $name,
            'path' => $path,
            'parent_path' => $parentPath,
            'type' => 'file',
            'extension' => $extension,
            'mime_type' => $mimeType,
            'size' => $size,
            'resource' => $resource,
            'file_modified_at' => Carbon::createFromTimestamp($disk->lastModified($path)),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function updateChildPaths($oldPath, $newPath)
    {
        // Get all children (files and folders)
        $children = DB::table('protected_files')
            ->where('path', 'like', $oldPath . '/%')
            ->get();

        foreach ($children as $child) {
            $newChildPath = str_replace($oldPath, $newPath, $child->path);
            $newParentPath = dirname($newChildPath);
            
            if ($newParentPath === '.') {
                $newParentPath = null;
            }

            DB::table('protected_files')
                ->where('id', $child->id)
                ->update([
                    'path' => $newChildPath,
                    'parent_path' => $newParentPath,
                    'updated_at' => now(),
                ]);
        }
    }
}
