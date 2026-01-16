<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ImageDemoController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q', '');
        $folder = storage_path('app/public/images/');

        // Get all files
        $allFiles = array_filter(scandir($folder), fn ($f) => ! in_array($f, ['.', '..']));

        // Filter by search query
        if ($query) {
            $allFiles = array_filter($allFiles, fn ($file) => stripos($file, $query) !== false);
        }

        $allFiles = array_values($allFiles); // reset keys

        // Pagination
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentFiles = array_slice($allFiles, ($currentPage - 1) * $perPage, $perPage);

        // Prepare array for view
        $images = array_map(function ($file) {
            $snippet = '<img src="/storage/images/'.$file.'" alt="'.pathinfo($file, PATHINFO_FILENAME).'" class="rounded-lg">';

            return [
                'name' => $file,
                'snippet' => $snippet,
                'url' => asset('storage/images/'.$file),
            ];
        }, $currentFiles);

        $paginator = new LengthAwarePaginator(
            $images,
            count($allFiles),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('myimage-demo', [
            'images' => $paginator,
            'query' => $query,
        ]);
    }

    public function serve($filename)
    {
        $path = storage_path('app/public/images/'.$filename);
        if (! file_exists($path)) {
            abort(404, 'Image not found.');
        }

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $mimeTypes = Image::mimeTypes();
        $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream';

        return response()->file($path, ['Content-Type' => $mimeType]);
    }

    public function destroy($filename)
    {
        $path = storage_path('app/public/images/'.$filename);
        if (file_exists($path)) {
            unlink($path);
        }

        return redirect()->route('myimage-demo')->with('success', 'Image deleted successfully.');
    }
}
