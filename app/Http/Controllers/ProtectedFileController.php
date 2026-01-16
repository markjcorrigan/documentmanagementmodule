<?php

namespace App\Http\Controllers;

use App\Models\ProtectedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProtectedFileController extends Controller
{
    /**
     * List all protected files
     */
    public function index(Request $request)
    {
        $query = ProtectedFile::query();
        $searchTerm = '';

        // Add search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('path', 'like', "%{$searchTerm}%");
            });
        }

        // Filter by resource if specified
        if ($request->has('resource') && !empty($request->resource)) {
            $query->where('resource', $request->resource);
        }

        // Filter by type if specified
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        $files = $query->orderBy('type', 'desc')->orderBy('name')->paginate(50);
        $query = $searchTerm;

        // Get all resources for filter dropdown
        $resources = ProtectedFile::select('resource')
            ->distinct()
            ->whereNotNull('resource')
            ->pluck('resource');

        return view('protected.index', compact('files', 'query', 'resources'));
    }

    /**
     * Show file details
     */
    public function show($id)
    {
        $file = ProtectedFile::findOrFail($id);

        return view('protected.show', compact('file'));
    }

    /**
     * Edit file metadata
     */
    public function edit($id)
    {
        $file = ProtectedFile::findOrFail($id);

        return view('protected.edit', compact('file'));
    }

    /**
     * Update file metadata
     */
    public function update(Request $request, $id)
    {
        $file = ProtectedFile::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // If renaming, update the file on disk
        if ($file->name !== $request->name && $file->type === 'file') {
            $oldPath = $file->path;
            $newPath = dirname($file->path) . '/' . $request->name;

            if ($newPath !== './' . $request->name) {
                if (Storage::disk('protected')->exists($oldPath)) {
                    Storage::disk('protected')->move($oldPath, $newPath);
                    $file->path = $newPath;
                    $file->name = $request->name;

                    // Update extension if changed
                    $file->extension = strtolower(pathinfo($request->name, PATHINFO_EXTENSION));
                }
            }
        }

        $file->description = $request->input('description');
        $file->save();

        return redirect()->route('protected.index')->with('success', 'File updated successfully!');
    }

    /**
     * Upload new file
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:512000', // 500MB max
            'resource' => 'required|string',
            'folder' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $resource = $request->input('resource');
        $folder = $request->input('folder', '');

        // Build the destination path
        $destinationPath = $resource;
        if (!empty($folder)) {
            $destinationPath .= '/' . trim($folder, '/');
        }

        // Save file to protected storage
        $filePath = $destinationPath . '/' . $originalName;

        // Check if file already exists
        if (Storage::disk('protected')->exists($filePath)) {
            return back()->with('error', 'File already exists at this location!');
        }

        Storage::disk('protected')->putFileAs($destinationPath, $file, $originalName);

        // Create database record
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $mimeTypes = ProtectedFile::mimeTypes();

        ProtectedFile::create([
            'name' => $originalName,
            'path' => $filePath,
            'parent_path' => $destinationPath === $resource ? null : $destinationPath,
            'type' => 'file',
            'extension' => $extension,
            'mime_type' => $mimeTypes[$extension] ?? 'application/octet-stream',
            'size' => Storage::disk('protected')->size($filePath),
            'resource' => $resource,
            'description' => $request->input('description'),
            'file_modified_at' => now(),
        ]);

        return redirect()->route('protected.index')->with('success', 'File uploaded successfully!');
    }

    /**
     * Create new folder
     */
    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string',
            'resource' => 'required|string',
            'parent_path' => 'nullable|string',
        ]);

        $folderName = Str::slug($request->input('folder_name'), '_');
        $resource = $request->input('resource');
        $parentPath = $request->input('parent_path', '');

        // Build folder path
        $folderPath = $resource;
        if (!empty($parentPath)) {
            $folderPath .= '/' . trim($parentPath, '/');
        }
        $folderPath .= '/' . $folderName;

        // Create folder on disk
        if (!Storage::disk('protected')->exists($folderPath)) {
            Storage::disk('protected')->makeDirectory($folderPath);

            // Create database record
            ProtectedFile::create([
                'name' => $folderName,
                'path' => $folderPath,
                'parent_path' => $resource . ($parentPath ? '/' . trim($parentPath, '/') : ''),
                'type' => 'folder',
                'resource' => $resource,
                'file_modified_at' => now(),
            ]);

            return redirect()->route('protected.index')->with('success', 'Folder created successfully!');
        }

        return back()->with('error', 'Folder already exists!');
    }

    /**
     * Delete file or folder
     */
    public function destroy($id)
    {
        $file = ProtectedFile::findOrFail($id);

        if ($file->type === 'folder') {
            // Delete all children first
            $children = ProtectedFile::where('parent_path', 'like', $file->path . '%')->get();
            foreach ($children as $child) {
                if (Storage::disk('protected')->exists($child->path)) {
                    if ($child->type === 'file') {
                        Storage::disk('protected')->delete($child->path);
                    }
                }
                $child->delete();
            }

            // Delete the folder
            if (Storage::disk('protected')->exists($file->path)) {
                Storage::disk('protected')->deleteDirectory($file->path);
            }
        } else {
            // Delete single file
            if (Storage::disk('protected')->exists($file->path)) {
                Storage::disk('protected')->delete($file->path);
            }
        }

        $file->delete();

        return redirect()->route('protected.index')->with('success', 'Deleted successfully!');
    }

    /**
     * Download file
     */
    public function download($id)
    {
        $file = ProtectedFile::findOrFail($id);

        if ($file->type !== 'file') {
            abort(404, 'Cannot download folders');
        }

        if (!Storage::disk('protected')->exists($file->path)) {
            abort(404, 'File not found on disk');
        }

        return Storage::disk('protected')->download($file->path, $file->name);
    }
}