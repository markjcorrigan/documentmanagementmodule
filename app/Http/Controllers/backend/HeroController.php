<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HeroController extends Controller
{
    public function HeroSection()
    {
        $hero = Hero::findOrNew(1);

        return view('backend.hero.here_section', compact('hero'));
    }

    public function UpdateHeroSection(Request $request)
    {
        $hero = Hero::findOrNew(1);

        if ($request->hasFile('photo')) {
            if ($hero->photo) {
                unlink(public_path($hero->photo));
            }
            $file = $request->file('photo');
            $imageName = 'Hero-'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $manager = new ImageManager(new Driver);
            $img = $manager->read($file);
            $img = $img->resize(437, 475);
            $img = $img->toJpeg(80)->save(base_path('public/uploads/hero/'.$imageName));
            $imagePath = 'uploads/hero/'.$imageName;
            $hero->photo = $imagePath;
        }

        if ($request->hasFile('resume')) {
            if ($hero->resume) {
                unlink(public_path($hero->resume));
            }
            $resume = $request->file('resume');
            $resumeNewName = 'Resume_'.hexdec(uniqid()).'.'.$resume->getClientOriginalExtension();
            $resume->move(public_path('uploads/resume'), $resumeNewName);
            $resumePath = 'uploads/resume/'.$resumeNewName;
            $hero->resume = $resumePath;
        }

        $hero->name = $request->name;
        $hero->profession = $request->profession;
        $hero->short_description = $request->short_description;
        $hero->twitter_url = $request->twitter_url;
        $hero->youtube_url = $request->youtube_url;
        $hero->linkin_url = $request->linkin_url;
        $hero->github_url = $request->github_url;
        $hero->YOE = $request->YOE;
        $hero->PC = $request->PC;
        $hero->HC = $request->HC;
        $hero->updated_at = Carbon::now();
        $hero->save();

        $notification = [
            'message' => 'Hero-Section Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
