<?php

namespace App\Http\Controllers;

class BookletController extends Controller
{
    public function seagull()
    {
        return response()->file(public_path('booklets/indexa.html'));
    }
}