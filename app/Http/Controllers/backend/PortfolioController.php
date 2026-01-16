<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PortfolioController extends Controller
{
    public function AllRecentWorks()
    {
        $works = Portfolio::Latest()->get();

        return view('backend.portfolio.all_recent_works', compact('works'));
    } // End method

    public function AddWork()
    {
        $services = Service::all();

        return view('backend.portfolio.add_work', compact('services'));
    } // End method

    public function StoreWork(Request $request)
    {
        //    584 x 500
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $imageName = 'work-'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension(); // work453rdfg-45.png
            $manager = new ImageManager(new Driver);
            $img = $manager->read($file);
            $img = $img->resize(584, 500);
            $img = $img->toJpeg(80)->save(base_path('public/uploads/porfolio/'.$imageName));
            $imagePath = 'uploads/porfolio/'.$imageName;

            $work = new Portfolio;
            $work->title = $request->title;
            $work->sub_title = $request->sub_title;
            $work->photo = $imagePath;
            $work->service_cat_id = $request->service_cat;
            $work->url = $request->url;
            $work->save();

            $notification = [
                'message' => 'Work Added With Photo Successfully!',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.recent.works')->with($notification);
        }

        $work = new Portfolio;
        $work->title = $request->title;
        $work->sub_title = $request->sub_title;
        $work->service_cat_id = $request->service_cat;
        $work->url = $request->url;
        $work->save();

        $notification = [
            'message' => 'Work Added Without Photo Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.recent.works')->with($notification);
    } // End method

    public function EditWork($id)
    {
        $work = Portfolio::find($id);
        $services = Service::all();

        return view('backend.portfolio.edit_work', compact('work', 'services'));
    } // End method

    public function UpdateWork(Request $request)
    {
        $work = Portfolio::findOrFail($request->work_id);
        if ($request->hasFile('photo')) {
            unlink($work->photo);
            $file = $request->file('photo');
            $imageName = 'work-'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension(); // work453rdfg-45.png
            $manager = new ImageManager(new Driver);
            $img = $manager->read($file);
            $img = $img->resize(584, 500);
            $img = $img->toJpeg(80)->save(base_path('public/uploads/porfolio/'.$imageName));
            $imagePath = 'uploads/porfolio/'.$imageName;

            $work->title = $request->title;
            $work->sub_title = $request->sub_title;
            $work->photo = $imagePath;
            $work->service_cat_id = $request->service_cat;
            $work->url = $request->url;
            $work->save();

            $notification = [
                'message' => 'Work Updated With Photo Successfully!',
                'alert-type' => 'info',
            ];

            return redirect()->route('all.recent.works')->with($notification);
        }

        $work->title = $request->title;
        $work->sub_title = $request->sub_title;
        $work->service_cat_id = $request->service_cat;
        $work->url = $request->url;
        $work->save();

        $notification = [
            'message' => 'Work Updated Without Photo Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.recent.works')->with($notification);
    } // End method

    public function DeleteWork($id)
    {
        $work = Portfolio::findOrFail($id);
        unlink($work->photo);
        $work->delete();
        $notification = [
            'message' => 'Work Deleted Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    } // End method
}
