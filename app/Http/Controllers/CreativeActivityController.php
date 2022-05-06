<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CreativeActivity;
use App\Models\Department;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CreativeActivityController extends Controller
{
    public function index()
    {
        $students = DB::select('SELECT students.fullname, creative_activities.* FROM creative_activities 
        Join students on creative_activities.student_id = students.id');
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('creativework.accrued_points')->with(['courses' => $courses, 'departments' => $departments, 'groups' => $groups, 'students' => $students]);
    }

    public function addCreativeActivity()
    {
        $students = Student::all();
        return View::make('forms.add_creative_points')->with(['students' => $students]);
    }

    public function createCreativeActivity(Request $request)
    {
        $validated = $request->validate([
            'student' => 'required|numeric',
            'public_mark' => 'required|numeric',
            'creat_achieviment_mark' => 'required|numeric',
            'scan_added' => 'required|numeric',
        ]);
        $creativeActivity = new CreativeActivity();
        $creativeActivity->student_id = $validated['student'];
        $creativeActivity->public_mark = $validated['public_mark'];
        $creativeActivity->creat_achieviment_mark = $validated['creat_achieviment_mark'];
        $creativeActivity->scan_added = $validated['scan_added'];
        $creativeActivity->save();
        return redirect('/creativework/accrued_points');
    }

    public function editCreativeActivity($id)
    {
        $students = Student::all();
        $creativeActivity = CreativeActivity::find($id);
        return View::make('forms.edit_creative_points')->with(['students' => $students, 'creativeActivity' => $creativeActivity]);
    }

    public function updateCreativeActivity(Request $request, $id)
    {
        $validated = $request->validate([
            'student' => 'required|numeric',
            'public_mark' => 'required|numeric',
            'creat_achieviment_mark' => 'required|numeric',
            'scan_added' => 'required|numeric',
        ]);

        $creativeActivity = CreativeActivity::find($id);
        $creativeActivity->student_id = $validated['student'];
        $creativeActivity->public_mark = $validated['public_mark'];
        $creativeActivity->creat_achieviment_mark = $validated['creat_achieviment_mark'];
        $creativeActivity->scan_added = $validated['scan_added'];
        $creativeActivity->save();
        return redirect('/creativework/accrued_points');
    }

    public function deleteCreativeActivity($id)
    {
        $creatActivity = CreativeActivity::where('id', $id)->delete();
        return redirect('/creativework/accrued_points');
    }

}
