<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class LegacyController extends Controller
{
    /**
     * Render HTML pages (replaces showAction)
     */
    public function show($page)
    {
        $viewPath = "legacy.home.{$page}";

        if (view()->exists($viewPath)) {
            return view($viewPath);
        }

        abort(404, 'File not found.');
    }

    /**
     * Serve PDF files (replaces viewAction and viewpdfAction)
     */
    public function viewPdf($subfolder = null, $filename = null)
    {
        // Handle both one and two parameter calls
        if ($filename === null) {
            $filename = $subfolder;
            $subfolder = 'Resources';
        }

        // Build the file path
        $filePath = resource_path("views/legacy/home/{$subfolder}/{$filename}");

        // Check if file exists
        if (! File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Check authentication for certain paths
        if (str_contains($filePath, '/Resources/') && ! Auth::check()) {
            abort(403, 'Access Denied');
        }

        // Serve the PDF
        return Response::file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.basename($filename).'"',
        ]);
    }

    /**
     * Serve video files (replaces viewvideoAction)
     */
    public function viewVideo($subfolder, $filename)
    {
        $filePath = resource_path("views/legacy/home/{$subfolder}/{$filename}");

        if (! File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Determine content type based on extension
        $extension = strtolower(File::extension($filename));
        $mimeTypes = [
            'mp4' => 'video/mp4',
            'avi' => 'video/x-msvideo',
            'mov' => 'video/quicktime',
            'wmv' => 'video/x-ms-wmv',
        ];

        $contentType = $mimeTypes[$extension] ?? 'application/octet-stream';

        return Response::file($filePath, [
            'Content-Type' => $contentType,
        ]);
    }

    /**
     * Download files (replaces saveAction)
     */
    public function download($subfolder, $filename)
    {
        $filePath = resource_path("views/legacy/home/{$subfolder}/{$filename}");

        if (! File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Get MIME type
        $mimeType = $this->getMimeType(File::extension($filename));

        return Response::download($filePath, $filename, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }

    /**
     * Download zip files (replaces savezipAction)
     */
    public function downloadZip($filename)
    {
        if (! Auth::check()) {
            abort(403, 'Access Denied');
        }

        $filePath = resource_path("views/legacy/home/resources/{$filename}");

        if (! File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        return Response::download($filePath, $filename, [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }

    /**
     * Serve files from public/cmmidev directory
     */
    public function servePublicFile($path)
    {
        $decodedPath = urldecode($path);

        // DEBUG - Remove this after testing
        //        if (str_contains($decodedPath, 'Resources/')) {
        //            dd([
        //                'path' => $decodedPath,
        //                'auth_check' => Auth::check(),
        //                'user' => Auth::user(),
        //                'session_id' => session()->getId(),
        //                'guards' => config('auth.guards'),
        //                'default_guard' => config('auth.defaults.guard'),
        //            ]);
        //        }

        // Secure the Resources folder
        if (str_contains($decodedPath, 'Resources/') && ! Auth::check()) {
            abort(403, 'Please login to access this resource');
        }

        $filePath = public_path("cmmidev/{$decodedPath}");

        if (! File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        $extension = File::extension($filePath);
        $mimeType = $this->getMimeType($extension);

        return Response::file($filePath, ['Content-Type' => $mimeType]);
    }

    /**
     * MIME type helper - CHANGED TO PUBLIC
     */
    public function getMimeType($extension)
    {
        $mimeTypes = [
            'pdf' => 'application/pdf',
            'zip' => 'application/zip',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'ppt' => 'application/vnd.ms-powerpoint',
            'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'txt' => 'text/plain',
            'html' => 'text/html',
            'htm' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'mp4' => 'video/mp4',
            'mp3' => 'audio/mpeg',
            'wav' => 'audio/wav',
        ];

        return $mimeTypes[strtolower($extension)] ?? 'application/octet-stream';
    }

    /**
     * Individual page actions (all those specific action methods)
     * We'll handle these through routes or a single method
     */
    //    public function page($action)
    //    {
    //        // Map old action names to view names
    //        $viewMap = [
    //            'realstory' => 'realstory',
    //            'cmmi' => 'cmmi',
    //            'log' => 'log',
    //            'vmodel' => 'vmodel',
    //            'cmmidevdash' => 'cmmidevdash',
    //            'pin' => 'pin',
    //            'itilessence' => 'itil',
    //            'itilpm' => 'itilpm',
    //            // ... add all other actions from your legacy controller
    //        ];
    //
    //        $viewName = $viewMap[$action] ?? $action;
    //        $viewPath = "legacy.home.{$viewName}";
    //
    //        if (view()->exists($viewPath)) {
    //            return view($viewPath);
    //        }
    //
    //        abort(404, 'Page not found.');
    //    }
}
