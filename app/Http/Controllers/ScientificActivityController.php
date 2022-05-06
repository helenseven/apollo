<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\ScientificActivity;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ScientificActivityController extends Controller
{
    public function index()
    {
        $students = DB::select('SELECT students.fullname, scientific_activities.* FROM scientific_activities 
        Join students on scientific_activities.student_id = students.id');
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('scientificactivity.accrued_points')->with(['courses' => $courses, 'departments' => $departments, 'groups' => $groups, 'students' => $students]);
    }

    public function addScientificActivity()
    {
        $students = Student::all();
        return View::make('forms.add_scientific_points')->with(['students' => $students]);
    }

    public function createScientificActivity(Request $request)
    {
        $validated = $request->validate([
            'student' => 'required|numeric',
            'akademic_mark' => 'required|numeric',
            'scientific_mark' => 'required|numeric',
            'scan_added' => 'required|numeric',
        ]);
        $scientificActivity = new ScientificActivity();
        $scientificActivity->student_id = $validated['student'];
        $scientificActivity->akademic_mark = $validated['akademic_mark'];
        $scientificActivity->scientific_mark = $validated['scientific_mark'];
        $scientificActivity->scan_added = $validated['scan_added'];
        $scientificActivity->save();
        return redirect('/scientificactivity/accrued_points');
    }

    public function editScientificActivity($id)
    {
        $students = Student::all();
        $scientificActivity = ScientificActivity::find($id);
        return View::make('forms.edit_scientific_points')->with(['students' => $students,'scientificActivity' => $scientificActivity]);
    }

    public function updateScientificActivity(Request $request, $id)
    {
        $validated = $request->validate([
            'student' => 'required|numeric',
            'akademic_mark' => 'required|numeric',
            'scientific_mark' => 'required|numeric',
            'scan_added' => 'required|numeric',
        ]);

        $scientificActivity = ScientificActivity::find($id);
        $scientificActivity->student_id = $validated['student'];
        $scientificActivity->akademic_mark = $validated['akademic_mark'];
        $scientificActivity->scientific_mark = $validated['scientific_mark'];
        $scientificActivity->scan_added = $validated['scan_added'];
        $scientificActivity->save();
        return redirect('/scientificactivity/accrued_points');
    }

    public function deleteScientificActivity($id)
    {
        $scientificActivity = ScientificActivity::where('id', $id)->delete();
        return redirect('/scientificactivity/accrued_points');
    }

}
