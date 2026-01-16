<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentDownloadController extends Controller
{
    public function download(Request $request)
    {
        $path = base64_decode($request->path);

        // Validate path is within uploads directory
        if (! str_starts_with($path, 'uploads/')) {
            abort(403, 'Unauthorized access');
        }

        if (! Storage::disk('private')->exists($path)) {
            abort(404, 'File not found');
        }

        // Log the download
        activity()
            ->causedBy(auth()->user())
            ->withProperties(['filepath' => $path])
            ->log('Downloaded file');

        $filename = basename($path);

        return Storage::disk('private')->download($path, $filename);
    }

    public function view(Request $request)
    {
        $path = base64_decode($request->path);

        // Validate path
        if (! str_starts_with($path, 'uploads/')) {
            abort(403, 'Unauthorized access');
        }

        if (! Storage::disk('private')->exists($path)) {
            abort(404, 'File not found');
        }

        $mimeType = Storage::disk('private')->mimeType($path);

        return response()->file(
            Storage::disk('private')->path($path),
            ['Content-Type' => $mimeType]
        );
    }
}
