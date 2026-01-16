<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class StuffController extends Controller
{
    public function show($filename)
    {
        $path = 'stuffs/jokes/'.$filename;

        // Make sure the file exists
        if (! Storage::disk('local')->exists($path)) {
            abort(404);
        }

        // Return the file securely
        return response()->file(storage_path('app/'.$path));
    }
}
