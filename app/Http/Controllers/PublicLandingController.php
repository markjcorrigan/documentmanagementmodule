<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicLandingController extends Controller
{
    /**
     * Display the public landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('public.public-landing');
    }
}