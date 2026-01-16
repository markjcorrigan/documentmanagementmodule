<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function AddSkill()
    {
        return view('backend.skills.add_skill');
    } // End method

    public function StoreSkill(Request $request)
    {
        $file = $request->file('icon');
        $iconName = 'tech_'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/skills/'), $iconName);
        $iconPath = 'uploads/skills/'.$iconName;

        $skill = new Skill;
        $skill->icon = $iconPath;
        $skill->exp_level = $request->exp_level;
        $skill->technology_name = $request->technology;
        $skill->save();

        $notification = [
            'message' => 'Skill Added Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.skills')->with($notification);
    } // End method

    public function AllSkills()
    {
        $allSkills = Skill::all();

        return view('backend.skills.all_skills', compact('allSkills'));
    } // End method

    public function EditSkill($id)
    {
        $skill = Skill::findOrFail($id);

        return view('backend.skills.edit_skill', compact('skill'));
    } // End method

    public function UpdateSkill(Request $request)
    {
        if ($request->hasFile('icon')) {
            $oldIcon = Skill::find($request->id)->icon;
            unlink($oldIcon);

            $file = $request->file('icon');
            $iconName = 'tech_'.hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/skills/'), $iconName);
            $iconPath = 'uploads/skills/'.$iconName;

            $skill = Skill::find($request->id);
            $skill->icon = $iconPath;
            $skill->exp_level = $request->exp_level;
            $skill->technology_name = $request->technology;
            $skill->save();

            $notification = [
                'message' => 'Skill Updated With Icon Successfully!',
                'alert-type' => 'info',
            ];

            return redirect()->route('all.skills')->with($notification);
        }

        $skill = Skill::find($request->id);
        $skill->exp_level = $request->exp_level;
        $skill->technology_name = $request->technology;
        $skill->save();

        $notification = [
            'message' => 'Skill Updated Without Icon Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.skills')->with($notification);

    } // End method

    public function DeleteSkill($id)
    {
        $oldIcon = Skill::find($id)->icon;
        unlink($oldIcon);

        Skill::find($id)->delete();
        $notification = [
            'message' => 'Skill Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    } // End method
}
