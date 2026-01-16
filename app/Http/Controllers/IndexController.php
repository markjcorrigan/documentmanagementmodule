<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Models\Category;
// use App\Models\Brand;
// use App\Models\Slider;
// use App\Models\Product;
// use App\Models\MultiImg;
use Illuminate\Support\Facades\Auth;

// use App\Models\SubCategory;
// use App\Models\SubSubCategory;

class IndexController extends Controller
{
    public function pmway()
    {
        $user = Auth::user();

        return view('Home.pmway', compact('user'));
    }

    public function pin()
    {
        $user = Auth::user();

        return view('Home.pin', compact('user'));
    }

    public function cmmi()
    {
        $user = Auth::user();

        return view('Home.cmmi', compact('user'));
    }

    public function cmmidevdash()
    {
        $user = Auth::user();

        return view('Home.cmmidevdash', compact('user'));
    }

    public function about()
    {
        $user = Auth::user();

        return view('Home.about', compact('user'));
    }

    public function scrumrca()
    {
        $user = Auth::user();

        return view('Home.scrumrca', compact('user'));
    }

    // app/Http/Controllers/IndexController.php

    // Change this method name
    public function Gamestats()  // was: gamestats()
    {
        $user = Auth::user();

        return view('Home.gamestats', compact('user'));
    }

    public function team()
    {
        $user = Auth::user();

        return view('Home.team', compact('user'));
    }

    public function removetheredbeads()
    {
        $user = Auth::user();

        return view('Home.removetheredbeads', compact('user'));
    }

    public function agile()
    {
        $user = Auth::user();

        return view('Home.agile', compact('user'));
    }

    public function scrumdashboards()
    {
        $user = Auth::user();

        return view('Home.scrumdashboards', compact('user'));
    }

    public function scrumvidlessons()
    {
        $user = Auth::user();

        return view('Home.scrumvidlessons', compact('user'));
    }

    public function itilfourpractices()
    {
        $user = Auth::user();

        return view('Home.itilfourpractices', compact('user'));
    }

    public function kanbancoffee()
    {
        $user = Auth::user();

        return view('Home.kanbancoffee', compact('user'));
    }

    public function freedoms()
    {
        $user = Auth::user();

        return view('Home.freedoms', compact('user'));
    }

    public function sailboat()
    {
        $user = Auth::user();

        return view('Home.sailboat', compact('user'));
    }

    public function thegame()
    {
        $user = Auth::user();

        return view('Home.thegame', compact('user'));
    }

    public function hamandeggs()
    {
        $user = Auth::user();

        return view('Home.hamandeggs', compact('user'));
    }

    public function baseline()
    {
        $user = Auth::user();

        return view('Home.baseline', compact('user'));
    }

    public function waterfallvsagile()
    {
        $user = Auth::user();

        return view('Home.waterfallvsagile', compact('user'));
    }

    public function vmodel()
    {
        $user = Auth::user();

        return view('Home.vmodel', compact('user'));
    }

    public function scrumvaluemodel()
    {
        $user = Auth::user();

        return view('Home.scrumvaluemodel', compact('user'));
    }

    public function dml()
    {
        $user = Auth::user();

        return view('Home.dml', compact('user'));
    }

    public function scrumroleclarity()
    {
        $user = Auth::user();

        return view('Home.scrumroleclarity', compact('user'));
    }

    public function sevenrulesofscrum()
    {
        $user = Auth::user();

        return view('Home.sevenrulesofscrum', compact('user'));
    }

    public function realstory()
    {
        $user = Auth::user();

        return view('Home.realstory', compact('user'));
    }

    public function agileisdead()
    {
        $user = Auth::user();

        return view('Home.agileisdead', compact('user'));
    }

    public function productincrement()
    {
        $user = Auth::user();

        return view('Home.productincrement', compact('user'));
    }

    public function workingsoftware()
    {
        $user = Auth::user();

        return view('Home.workingsoftware', compact('user'));
    }

    public function burndown()
    {
        $user = Auth::user();

        return view('Home.burndown', compact('user'));
    }

    public function accelerate()
    {
        $user = Auth::user();

        return view('Home.accelerate', compact('user'));
    }

    public function safeisunsafe()
    {
        $user = Auth::user();

        return view('Home.safeisunsafe', compact('user'));
    }

    public function af()
    {
        $user = Auth::user();

        return view('Home.af', compact('user'));
    }

    public function release()
    {
        $user = Auth::user();

        return view('Home.release', compact('user'));
    }

    public function itiloverview()
    {
        $user = Auth::user();

        return view('Home.itiloverview', compact('user'));
    }

    public function itilss()
    {
        $user = Auth::user();

        return view('Home.itilss', compact('user'));
    }

    public function itilsd()
    {
        $user = Auth::user();

        return view('Home.itilsd', compact('user'));
    }

    public function itilst()
    {
        $user = Auth::user();

        return view('Home.itilst', compact('user'));
    }

    public function itilso()
    {
        $user = Auth::user();

        return view('Home.itilso', compact('user'));
    }

    public function itilcsi()
    {
        $user = Auth::user();

        return view('Home.itilcsi', compact('user'));
    }

    public function procrastination()
    {
        $user = Auth::user();

        return view('Home.procrastination', compact('user'));
    }

    public function recharge()
    {
        $user = Auth::user();

        return view('Home.recharge', compact('user'));
    }

    public function measurement()
    {
        $user = Auth::user();

        return view('Home.measurement', compact('user'));
    }

    public function laws()
    {
        $user = Auth::user();

        return view('Home.laws', compact('user'));
    }

    public function monkey()
    {
        $user = Auth::user();

        return view('Home.monkey', compact('user'));
    }

    // /////////////////the PMBok dashboard pages
    public function homePage($page)
    {
        $user = Auth::user();
        if (! view()->exists('Home.'.$page)) {
            abort(404);
        }

        return view('Home.'.$page, compact('user'));
    }

    /**
     * Check if current user is super admin.
     */
    protected function checkSuperAdmin()
    {
        if (! Auth::check() || ! Auth::user()->hasRole('Super Admin')) {
            abort(403, 'Access Denied');
        }
    }

    /**
     * Serve file inline or for download with optional MIME type.
     */
    protected function serveOrDownloadFile($baseFolder, $subfolder, $filename, $forcedMime = null)
    {
        $this->checkSuperAdmin();

        // Updated storage folder
        $filePath = storage_path("app/public/assets/{$subfolder}/{$filename}");

        if (! file_exists($filePath)) {
            abort(404, 'File not found');
        }

        $mimeType = $forcedMime ?? mime_content_type($filePath);
        $download = request()->query('download', false);

        header("Content-Type: {$mimeType}");
        if ($download) {
            header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
        } else {
            header('Content-Disposition: inline; filename="'.basename($filePath).'"');
        }
        header('Content-Length: '.filesize($filePath));
        readfile($filePath);
        exit;
    }

    /**
     * Inline view PDF
     */
    public function viewpdf($subfolder, $filename)
    {
        return $this->serveOrDownloadFile('Home', $subfolder, $filename, 'application/pdf');
    }

    /**
     * Inline view Video
     */
    public function viewvideo($subfolder, $filename)
    {
        return $this->serveOrDownloadFile('Home', $subfolder, $filename);
    }

    /**
     * Generic download (PDF, video, ZIP, etc.)
     */
    public function saveAction($subfolder, $filename)
    {
        return $this->serveOrDownloadFile('Home', $subfolder, $filename);
    }

    /**
     * ZIP download
     */
    public function downloadZip($filename)
    {
        $subfolder = ''; // root of storage/assets for ZIPs

        return $this->serveOrDownloadFile('Home', $subfolder, $filename);
    }

    /**
     * Upload / replace a file
     */
    public function uploadFile(Request $request)
    {
        $this->checkSuperAdmin();

        $subfolder = $request->input('subfolder') ?? '';
        $filename = $request->input('filename');

        if (! $request->hasFile('file') || ! $filename) {
            abort(400, 'No file uploaded or missing parameters');
        }

        $file = $request->file('file');
        $destinationPath = storage_path("app/public/assets/{$subfolder}/");

        $file->move($destinationPath, $filename);

        return back()->with('success', "{$filename} uploaded successfully!");
    }

    /**
     * User view file (inline or download)
     */
    public function userViewFile(Request $request, $subfolder, $filename)
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('message', 'You must log in to view this file.');
        }

        $subfolder = basename($subfolder);
        $filename = basename($filename);

        $path = storage_path("app/public/assets/{$subfolder}/{$filename}");

        if (! file_exists($path)) {
            abort(404, 'File not found.');
        }

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $inlineMimeTypes = [
            'pdf' => 'application/pdf',
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'ogg' => 'video/ogg',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ];

        $mime = $inlineMimeTypes[$extension] ?? 'application/octet-stream';

        $disposition = $request->query('download') == 1 ? 'attachment' :
            (array_key_exists($extension, $inlineMimeTypes) ? 'inline' : 'attachment');

        return response()->file($path, [
            'Content-Type' => $mime,
            'Content-Disposition' => "{$disposition}; filename=\"{$filename}\"",
        ]);
    }

    /**
     * Download PDF by filename
     */
    public function downloadPdf($filename)
    {
        $path = storage_path("app/public/assets/{$filename}");

        if (! file_exists($path)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];

        return response()->download($path, $filename, $headers);
    }
}
