<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GuitarScoreController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('guitar_scores')
            ->where('type', 'file')
            ->whereIn('extension', ['mp3', 'mp4', 'pdf', 'jpg', 'jpeg', 'png'])
            ->select(['id', 'name', 'path', 'parent_path', 'extension', 'size', 'file_modified_at']);
        
        if ($request->has('search') && !empty($searchTerm = trim($request->search))) {
            $query->where('name', 'like', "%{$searchTerm}%");
        }
        
        $files = $query->orderBy('file_modified_at', 'desc')->paginate(20);
        
        // Convert file_modified_at strings to Carbon instances for the view
        $files->getCollection()->transform(function ($file) {
            $file->file_modified_at = \Carbon\Carbon::parse($file->file_modified_at);
            return $file;
        });
        
        return view('protectedguitar.simple', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:102400|mimes:mp3,mp4,pdf,jpg,jpeg,png'
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        
        // Get file info BEFORE moving (important!)
        $fileSize = $file->getSize();
        $fileExtension = strtolower($file->getClientOriginalExtension());
        
        // Check if a file with this path already exists
        $existingFile = DB::table('guitar_scores')
            ->where('type', 'file')
            ->where('path', $fileName)
            ->first();
        
        if ($existingFile) {
            return back()->with('error', "⚠️ File '{$fileName}' already exists in root folder. Please rename the file before uploading or delete the existing file first.");
        }
        
        // Move file directly to storage/protectedGuitar
        $destinationPath = storage_path('protectedGuitar');
        $file->move($destinationPath, $fileName);
        
        // Store just the filename as the path
        $path = $fileName;

        DB::table('guitar_scores')->insert([
            'name' => $fileName,
            'path' => $path,
            'parent_path' => null,
            'type' => 'file',
            'extension' => $fileExtension,
            'size' => $fileSize,
            'file_modified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'File uploaded successfully');
    }

    public function view($id)
    {
        $file = DB::table('guitar_scores')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            return back()->with('error', "File ID {$id} not found in database. Database may have been rebuilt.");
        }
        
        $filePath = storage_path('protectedGuitar/' . $file->path);

        if (!file_exists($filePath)) {
            return back()->with('error', "Physical file not found: {$file->path}");
        }

        // For audio/video, show player page
        if (in_array($file->extension, ['mp3', 'mp4'])) {
            $file->file_modified_at = \Carbon\Carbon::parse($file->file_modified_at);
            return view('protectedguitar.player', compact('file'));
        }

        // For other files, serve directly
        $mimeTypes = [
            'pdf' => 'application/pdf',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
        ];

        $mimeType = $mimeTypes[$file->extension] ?? 'application/octet-stream';

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $file->name . '"'
        ]);
    }

    public function stream($id)
    {
        $file = DB::table('guitar_scores')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            abort(404, "File ID {$id} not found");
        }
        
        $filePath = storage_path('protectedGuitar/' . $file->path);

        if (!file_exists($filePath)) {
            abort(404, "Physical file not found: {$file->path}");
        }

        $mimeTypes = [
            'mp3' => 'audio/mpeg',
            'mp4' => 'video/mp4',
        ];

        $mimeType = $mimeTypes[$file->extension] ?? 'application/octet-stream';

        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'Accept-Ranges' => 'bytes',
        ]);
    }

    public function download($id)
    {
        $file = DB::table('guitar_scores')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            return back()->with('error', "File ID {$id} not found. Database may have been rebuilt.");
        }
        
        $filePath = storage_path('protectedGuitar/' . $file->path);

        if (!file_exists($filePath)) {
            return back()->with('error', "Physical file not found: {$file->path}");
        }

        return response()->download($filePath, $file->name);
    }

    public function edit($id)
    {
        $file = DB::table('guitar_scores')
            ->where('id', $id)
            ->where('type', 'file')
            ->select(['id', 'name', 'path', 'parent_path', 'extension', 'size', 'file_modified_at'])
            ->first();
        
        if (!$file) {
            return redirect()->route('guitar.index')->with('error', "File ID {$id} not found in database. The database may have been rebuilt, causing IDs to change.");
        }
        
        // Convert file_modified_at to Carbon instance for the view
        $file->file_modified_at = \Carbon\Carbon::parse($file->file_modified_at);
        
        return view('protectedguitar.edit', compact('file'));
    }

    public function update(Request $request, $id)
    {
        $file = DB::table('guitar_scores')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            return redirect()->route('guitar.index')->with('error', "File ID {$id} not found. Database may have been rebuilt.");
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $newName = $request->name;
        
        // Ensure extension is preserved
        if (!str_ends_with($newName, '.' . $file->extension)) {
            $newName .= '.' . $file->extension;
        }

        // Build paths
        $oldPath = storage_path('protectedGuitar/' . $file->path);
        $directory = dirname($file->path);
        $newPath = ($directory === '.' || $directory === '') ? $newName : $directory . '/' . $newName;
        $newFullPath = storage_path('protectedGuitar/' . $newPath);

        // Check if the new path already exists (different file with same name in same folder)
        if ($newPath !== $file->path) {
            $duplicate = DB::table('guitar_scores')
                ->where('type', 'file')
                ->where('path', $newPath)
                ->where('id', '!=', $id)
                ->first();
            
            if ($duplicate) {
                $folderMsg = $file->parent_path ? "in folder '{$file->parent_path}'" : "in root folder";
                return back()->with('error', "⚠️ A file named '{$newName}' already exists {$folderMsg}. Please choose a different name.");
            }
        }

        // Rename physical file on disk FIRST
        if (file_exists($oldPath)) {
            if (!rename($oldPath, $newFullPath)) {
                return back()->with('error', 'Failed to rename physical file on disk. Check file permissions.');
            }
        } else {
            return back()->with('error', 'Original file not found on disk: ' . $file->path);
        }

        // Update database AFTER successful disk rename
        $updated = DB::table('guitar_scores')
            ->where('id', $id)
            ->update([
                'name' => $newName,
                'path' => $newPath,
                'updated_at' => now(),
            ]);

        if (!$updated) {
            return back()->with('error', 'Database update failed after renaming file on disk.');
        }

        // Extract the base filename (without extension) to use as search term
        $searchTerm = pathinfo($newName, PATHINFO_FILENAME);

        // Redirect to search results showing the renamed file
        return redirect()->route('guitar.index', ['search' => $searchTerm])
            ->with('success', "✅ File renamed: '{$file->name}' → '{$newName}' - Database updated immediately!");
    }

    public function destroy($id)
    {
        $file = DB::table('guitar_scores')->where('id', $id)->where('type', 'file')->first();
        
        if (!$file) {
            return back()->with('error', "File ID {$id} not found");
        }
        
        $filePath = storage_path('protectedGuitar/' . $file->path);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        DB::table('guitar_scores')->where('id', $id)->delete();

        return redirect()->route('guitar.index')->with('success', 'File deleted from disk and database');
    }
}
