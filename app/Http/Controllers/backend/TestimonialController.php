<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testinomial;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TestimonialController extends Controller
{
    public function AddTestimony()
    {
        return view('backend.testimonial.add_testimony');
    } // End method

    public function StoreTestimony(Request $request)
    {
        // 119 x 122
        $file = $request->file('photo');
        $imageName = 'testimonial_'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension(); // work453rdfg-45.png
        $manager = new ImageManager(new Driver);
        $img = $manager->read($file);
        $img = $img->resize(119, 122);
        $img = $img->toJpeg(80)->save(base_path('public/uploads/testimonial/'.$imageName));
        $imagePath = 'uploads/testimonial/'.$imageName;

        $data = [
            'name' => $request->name,
            'occupation' => $request->occupation,
            'photo' => $imagePath,
            'testimony' => $request->testimony,
        ];

        Testinomial::create($data);

        $notification = [
            'message' => 'Testimony Added Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.testimoies')->with($notification);
    } // End method

    public function AllTestimonies()
    {
        $testimonies = Testinomial::all();

        return view('backend.testimonial.all_testimonies', compact('testimonies'));
    } // End method

    public function EditTestimony($id)
    {
        $testimony = Testinomial::find($id);

        return view('backend.testimonial.edit_testimony', compact('testimony'));
    } // End method

    public function UpdateTestimony(Request $request)
    {
        if ($request->hasFile('photo')) {

            $oldPhoto = Testinomial::find($request->id);
            unlink($oldPhoto->photo);

            $file = $request->file('photo');
            $imageName = 'testimonial_'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension(); // work453rdfg-45.png
            $manager = new ImageManager(new Driver);
            $img = $manager->read($file);
            $img = $img->resize(119, 122);
            $img = $img->toJpeg(80)->save(base_path('public/uploads/testimonial/'.$imageName));
            $imagePath = 'uploads/testimonial/'.$imageName;

            $data = [
                'name' => $request->name,
                'occupation' => $request->occupation,
                'photo' => $imagePath,
                'testimony' => $request->testimony,
            ];

            Testinomial::find($request->id)->update($data);

            $notification = [
                'message' => 'Testimony Updated With Photo Successfully!',
                'alert-type' => 'info',
            ];

            return redirect()->route('all.testimoies')->with($notification);
        }

        $data = [
            'name' => $request->name,
            'occupation' => $request->occupation,
            'testimony' => $request->testimony,
        ];

        Testinomial::find($request->id)->update($data);

        $notification = [
            'message' => 'Testimony Updated Without Photo Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.testimoies')->with($notification);
    } // End method

    public function DeleteTestimony($id)
    {
        $oldPhoto = Testinomial::find($id);
        unlink($oldPhoto->photo);
        Testinomial::find($id)->delete();
        $notification = [
            'message' => 'Testimony Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    } // End method

}
