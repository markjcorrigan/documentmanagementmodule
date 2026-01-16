<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SiteSettingsController extends Controller
{
    public function SiteSettings()
    {
        $sData = SiteSettings::find(1);

        return view('backend.setting.site_settings', compact('sData'));
    }

    public function UpdateSiteSettings(Request $request)
    {
        // Validate the file type
        $request->validate([
            'logo' => 'mimes:svg,png,jpg,jpeg',
        ]);

        if ($request->hasFile('logo')) {
            // Delete Old Logo
            $oldLogo = SiteSettings::find(1);
            if ($oldLogo->logo && file_exists(public_path($oldLogo->logo))) {
                unlink(public_path($oldLogo->logo));
            }

            // Processing new Logo
            $file = $request->file('logo');
            $imageName = 'Logo_'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $extension = strtolower($file->getClientOriginalExtension());

            if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
                $manager = new ImageManager(new Driver);
                $img = $manager->read($file);
                $img = $img->resize(156, 156);

                if ($extension == 'png') {
                    $img = $img->toPng()->save(public_path('uploads/logo/'.$imageName));
                } else {
                    $img = $img->toJpeg(80)->save(public_path('uploads/logo/'.$imageName));
                }
            } else {
                $file->move(public_path('uploads/logo/'), $imageName);
            }

            $logoPath = 'uploads/logo/'.$imageName;

            SiteSettings::find(1)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'logo' => $logoPath,
                'footer_note' => $request->footer_note,
            ]);

            $notification = [
                'message' => 'SiteSettings Updated With Logo Successfully!',
                'alert-type' => 'info',
            ];

            return redirect()->back()->with($notification);
        }

        SiteSettings::find(1)->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'footer_note' => $request->footer_note,
        ]);

        $notification = [
            'message' => 'SiteSettings Updated Without Logo Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}
