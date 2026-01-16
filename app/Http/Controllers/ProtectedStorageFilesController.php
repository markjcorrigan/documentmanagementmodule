<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProtectedStorageFilesController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('protected_files')->where('type', 'file');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('path', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by resource
        if ($request->has('resource') && $request->resource) {
            $query->where('resource', $request->resource);
        }

        // Filter by extension
        if ($request->has('extension') && $request->extension) {
            $query->where('extension', $request->extension);
        }

        $files = $query->orderBy('name')->paginate(50);

        return view('protected.protectedIndex', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:512000', // 500MB max
            'folder' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $folder = $request->input('folder', '');
        
        $filename = $file->getClientOriginalName();
        $path = $folder ? $folder . '/' . $filename : $filename;
        
        // Store file
        Storage::disk('protected')->putFileAs($folder, $file, $filename);
        
        // Get file info
        $extension = strtolower($file->getClientOriginalExtension());
        $size = $file->getSize();
        $parentPath = $folder ?: null;
        
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
        
        // Insert into database
        DB::table('protected_files')->insert([
            'name' => $filename,
            'path' => $path,
            'parent_path' => $parentPath,
            'type' => 'file',
            'extension' => $extension,
            'mime_type' => $mimeType,
            'size' => $size,
            'resource' => $resource,
            'file_modified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully!');
    }

    public function view($id)
    {
        $file = DB::table('protected_files')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, 'File not found');
        }

        $disk = Storage::disk('protected');
        
        if (!$disk->exists($file->path)) {
            abort(404, 'File not found on disk');
        }

        $fileContent = $disk->get($file->path);
        
        return response($fileContent)
            ->header('Content-Type', $file->mime_type)
            ->header('Content-Disposition', 'inline; filename="' . $file->name . '"');
    }

    public function stream($id)
    {
        $file = DB::table('protected_files')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, 'File not found');
        }

        $disk = Storage::disk('protected');
        
        if (!$disk->exists($file->path)) {
            abort(404, 'File not found on disk');
        }

        $stream = $disk->readStream($file->path);
        
        return response()->stream(function () use ($stream) {
            fpassthru($stream);
        }, 200, [
            'Content-Type' => $file->mime_type,
            'Content-Length' => $file->size,
        ]);
    }

    public function download($id)
    {
        $file = DB::table('protected_files')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, 'File not found');
        }

        $disk = Storage::disk('protected');
        
        if (!$disk->exists($file->path)) {
            abort(404, 'File not found on disk');
        }

        return response()->download($disk->path($file->path), $file->name);
    }

    public function edit($id)
    {
        $file = DB::table('protected_files')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, 'File not found');
        }

        return view('protected.protectedEdit', compact('file'));
    }

    public function update(Request $request, $id)
    {
        $file = DB::table('protected_files')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, 'File not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'resource' => 'nullable|string|max:255',
        ]);

        $disk = Storage::disk('protected');
        $oldPath = $file->path;
        $newName = $request->input('name');
        
        // Calculate new path
        $parentPath = dirname($oldPath);
        if ($parentPath === '.') {
            $newPath = $newName;
        } else {
            $newPath = $parentPath . '/' . $newName;
        }

        // Rename file on disk if name changed
        if ($oldPath !== $newPath) {
            if ($disk->exists($oldPath)) {
                $disk->move($oldPath, $newPath);
            }
        }

        // Update database
        DB::table('protected_files')
            ->where('id', $id)
            ->update([
                'name' => $newName,
                'path' => $newPath,
                'description' => $request->input('description'),
                'resource' => $request->input('resource'),
                'updated_at' => now(),
            ]);

        return redirect()->route('protectedstorage.index')->with('success', 'File updated successfully!');
    }

    public function destroy($id)
    {
        $file = DB::table('protected_files')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, 'File not found');
        }

        $disk = Storage::disk('protected');
        
        // Delete from disk
        if ($disk->exists($file->path)) {
            $disk->delete($file->path);
        }

        // Delete from database
        DB::table('protected_files')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'File deleted successfully!');
    }
}
