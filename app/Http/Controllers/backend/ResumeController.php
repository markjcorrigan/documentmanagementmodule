<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function MyExperience()
    {
        $experiences = Resume::where('resume_cat', 'experience')->get();

        return view('backend.resume.my_experience', compact('experiences'));
    } // End method

    public function StoreExperience(Request $request)
    {
        Resume::create([
            'resume_cat' => $request->resume_cat,
            'resume_title' => $request->resume_title,
            'institution' => $request->institution,
            'from_year' => $request->from_year,
            'to_year' => $request->to_year,
        ]);

        if ($request->resume_cat == 'experience') {
            $notification = [
                'message' => 'Experience Added Successfully!',
                'alert-type' => 'success',
            ];
        } else {
            $notification = [
                'message' => 'Education Added Successfully!',
                'alert-type' => 'success',
            ];
        }

        return redirect()->back()->with($notification);
    } // End method

    public function EditExperience($id)
    {
        $experience = Resume::find($id);

        return response()->json($experience);
    } // End method

    public function UpdateExperience(Request $request)
    {
        $expData = [
            'resume_title' => $request->resume_title,
            'institution' => $request->institution,
            'from_year' => $request->from_year,
            'to_year' => $request->to_year,
        ];

        Resume::findOrFail($request->exp_id)->update($expData);

        if ($request->resume_cat == 'experience') {
            $notification = [
                'message' => 'Experience Updated Successfully!',
                'alert-type' => 'info',
            ];
        } else {
            $notification = [
                'message' => 'Education Updated Successfully!',
                'alert-type' => 'success',
            ];
        }

        return redirect()->back()->with($notification);
    } // End method

    public function DeleteExperience($id)
    {
        Resume::findOrFail($id)->delete();
        $notification = [
            'message' => 'Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    } // End method

    //
    //    public function MyEducation()
    //    {
    //        try {
    //            $educations = Resume::where('resume_cat', 'education')->get();
    //            return view('backend.resume.my_education', compact('educations'));
    //        } catch (\Exception $e) {
    //            dd($e->getMessage());
    //        }
    //    }

    public function MyEducation()
    {
        $educations = Resume::where('resume_cat', 'education')->get();

        return view('backend.resume.my_education', compact('educations'));
    } // End method

}
