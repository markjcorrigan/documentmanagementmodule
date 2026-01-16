<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PdfController extends Controller
{
    /**
     * Display PDF viewer page
     */
    public function index()
    {
        // Get list of PDF files from storage
        $pdfFiles = $this->getPdfFiles();

        return view('pdf.index', compact('pdfFiles'));
    }

    /**
     * View a specific PDF in browser
     */
    public function view($filename)
    {
        $path = $this->getPdfPath($filename);

        if (!$path || !file_exists($path)) {
            abort(404, 'PDF not found');
        }

        // For HTML view with embedded PDF
        return view('pdf.viewer', [
            'filename' => $filename,
            'pdfUrl' => route('pdf.download', ['filename' => $filename])
        ]);
    }

    /**
     * Download PDF file
     */
    public function download($filename)
    {
        // Security: prevent directory traversal
        $filename = basename($filename);

        // Path to PDF in public/booklets/
        $path = public_path('booklets/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'PDF not found: ' . $filename);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

    /**
     * Force download PDF
     */
    public function forceDownload($filename)
    {
        $path = $this->getPdfPath($filename);

        if (!$path || !file_exists($path)) {
            abort(404, 'PDF not found');
        }

        return response()->download($path, $filename);
    }

    /**
     * Get list of available PDF files
     */
    private function getPdfFiles()
    {
        $pdfDir = public_path('booklets');
        $files = [];

        if (is_dir($pdfDir)) {
            $allFiles = scandir($pdfDir);
            foreach ($allFiles as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                    $files[] = [
                        'name' => $file,
                        'size' => $this->formatBytes(filesize($pdfDir . '/' . $file)),
                        'date' => date('Y-m-d', filemtime($pdfDir . '/' . $file))
                    ];
                }
            }
        }

        return $files;
    }

    /**
     * Get full path to PDF file
     */
    private function getPdfPath($filename)
    {
        // Security: prevent directory traversal
        $filename = basename($filename);

        // Check in public/booklets first
        $paths = [
            public_path('booklets/' . $filename),
            storage_path('app/public/booklets/' . $filename),
            public_path('uploads/' . $filename),
        ];

        foreach ($paths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        return null;
    }

    /**
     * Format bytes to human readable
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
