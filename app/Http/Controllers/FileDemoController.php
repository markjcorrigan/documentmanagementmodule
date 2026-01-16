<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FileDemoController extends Controller
{
    // List files
    public function index(Request $request)
    {
        $query = $request->input('q', '');

        $folder = storage_path('app/public/assets'); // points to storage/app/assets
        $allFiles = array_filter(scandir($folder), fn ($f) => ! in_array($f, ['.', '..']));

        // Filter search query
        if ($query) {
            $allFiles = array_filter($allFiles, fn ($file) => stripos($file, $query) !== false);
        }

        $documents = array_map(function ($file, $index) use ($folder) {
            $path = $folder.DIRECTORY_SEPARATOR.$file;
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Get MIME type from Document model
            $mimeTypes = Document::mimeTypes();
            $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream'; // Fallback to a generic MIME type

            // Render preview
            $rendered = '';
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])) {
                $rendered = '<img src="'.route('myfile-demo.serve', ['filename' => $file]).'" alt="'.$file.'">';
            } elseif (in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi'])) {
                $rendered = '<video controls src="'.route('myfile-demo.serve', ['filename' => $file]).'"></video>';
            } elseif (in_array($ext, ['mp3', 'wav', 'mid'])) {
                $rendered = '<audio controls src="'.route('myfile-demo.serve', ['filename' => $file]).'"></audio>';
            } else {
                $rendered = '<a href="'.route('myfile-demo.serve', ['filename' => $file]).'" >'.$file.'</a>';
            }

            return [
                'id' => $index,
                'name' => $file,
                'rendered' => $rendered,
                'code' => '<a href="'.route('myfile-demo.serve', ['filename' => $file]).'">'.$file.'</a>',
                'code_safe' => htmlspecialchars('<a href="'.route('myfile-demo.serve', ['filename' => $file]).'">'.$file.'</a>'),
                'path' => $path,
                'mimeType' => $mimeType, // Add MIME type for future use if needed
            ];
        }, array_values($allFiles), array_keys($allFiles));

        // Manual pagination
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($documents, ($currentPage - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator(
            $currentItems,
            count($documents),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('myfile-demo', ['documents' => $paginator, 'query' => $query]);
    }

    // Securely serve files (only for viewing inline)
    public function serve($filename)
    {
        $path = storage_path('app/public/assets/'.$filename);

        if (! file_exists($path)) {
            abort(404, 'File not found.');
        }

        // Get MIME type dynamically from the Document model
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $mimeTypes = Document::mimeTypes();
        $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream'; // Default MIME type

        return response()->file($path, [
            'Content-Type' => $mimeType,  // Send the correct MIME type to the browser
        ]);
    }

    public function destroy($id)
    {
        //        dd('Destroy method hit!', $id); // This will output and stop the process to confirm that it's reached
        //        dd('Incoming ID: ', $id);
        // Retrieve the document from the database
        $document = Document::find($id);

        if (! $document) {
            return back()->with('error', 'Document not found.');
        }

        // File path in the storage directory
        $filePath = storage_path('app/public/assets/'.$document->name);

        // Check if the file exists and delete it
        if (file_exists($filePath)) {
            unlink($filePath);  // Delete the file
        } else {
            return back()->with('error', 'Failed to delete the file from storage. File not found.');
        }

        // Delete the document from the database
        if ($document->delete()) {
            // Redirect back with success message
            return redirect()->route('myfile-demo')->with('success', 'Document deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete the document from the database.');
        }
    }
}
