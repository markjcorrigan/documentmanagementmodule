<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    // Load the editor page
    public function load($filename = null)
    {
        $content = '';

        // Load file content if filename given
        if ($filename && Storage::disk('public')->exists('editor/'.$filename)) {
            $content = Storage::disk('public')->get('editor/'.$filename);
        }

        // Get all files in 'editor' folder (basenames only)
        $files = array_map('basename', Storage::disk('public')->files('editor'));

        return view('Home.editor', [
            'content' => $content,
            'files' => $files,
            'filename' => $filename,
        ]);
    }

    // Save content
    public function save(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'custom_name' => 'nullable|string|max:10',
        ]);

        $content = $request->input('content');
        $prefix = $request->input('custom_name') ?: 'editor';

        $filename = $prefix.'_'.date('Ymd_Hi').'.html';
        Storage::disk('public')->put('editor/'.$filename, $content);

        return redirect()->route('editor.load', $filename)
            ->with('success', "Content saved as $filename!");
    }

    // Delete file
    public function delete(Request $request, $filename)
    {
        $filename = urldecode($filename);
        $filePath = storage_path("app/public/editor/{$filename}");

        if (! File::exists($filePath)) {
            return response()->json(['message' => "File not found: {$filePath}"], 404);
        }

        try {
            if (File::delete($filePath) || @unlink($filePath)) {
                return response()->json(['message' => 'File deleted successfully']);
            } else {
                return response()->json(['message' => 'File could not be deleted (maybe locked)'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Delete failed: '.$e->getMessage()], 500);
        }
    }
}
