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
use Illuminate\Support\Facades\Storage;

class ScientificActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->department !== null && $request->course !== null && $request->group !== null) {
            $query = 'SELECT 
            finances.title, students.fullname, total_rating.*, 
            scientific_activities.akademic_mark, scientific_activities.scientific_mark,
            scientific_activities.scan_added
            FROM total_rating 
            Join students on total_rating.student_id = students.id
            Join finances on total_rating.finance_id = finances.id
            Join scientific_activities on scientific_activities.student_id = students.id
            WHERE total_rating.finance_id = 1
                AND students.department_id = ' . $request->department
                . ' AND students.course_id = ' . $request->course
                . ' AND students.group_id = ' . $request->group;
            
            $students = DB::select($query);
            $departmentId = $request->department;
            $courseId = $request->course;
            $groupId = $request->group;
        } else {
            $students = [];
            $departmentId = 0;
            $courseId = 0;
            $groupId = 0;
        }
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('scientificactivity.accrued_points')->with(
            [
                'courses' => $courses, 
                'departments' => $departments, 
                'groups' => $groups, 
                'students' => $students,
                'departmentId' => $departmentId,
                'groupId' => $groupId,
                'courseId' => $courseId
            ]);
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
            'scan' => 'mimes:pdf|max:20000'
        ]);

        $path = '';

        if ($request->file('scan') !== null && $request->file()) {
            $path = Storage::disk('local')->put('.', $request->file('scan'));
        }
        $scientificActivity = new ScientificActivity();
        $scientificActivity->student_id = $validated['student'];
        $scientificActivity->akademic_mark = $validated['akademic_mark'];
        $scientificActivity->scientific_mark = $validated['scientific_mark'];
        $scientificActivity->scan_added = $validated['scan_added'];
        $scientificActivity->scan = $path;
        $scientificActivity->save();
        return redirect('/scientificactivity/accrued_points');
    }

    public function editScientificActivity($id)
    {
        $students = Student::all();
        $scientificActivity = ScientificActivity::find($id);
        return View::make('forms.edit_scientific_points')->with(['students' => $students, 'scientificActivity' => $scientificActivity]);
    }

    public function updateScientificActivity(Request $request, $id)
    {
        $validated = $request->validate([
            'student' => 'required|numeric',
            'akademic_mark' => 'required|numeric',
            'scientific_mark' => 'required|numeric',
            'scan_added' => 'required|numeric',
            'scan' => 'mimes:pdf|max:20000'
        ]);

        $path = '';

        if ($request->file('scan') !== null && $request->file()) {
            $path = Storage::disk('local')->put('.', $request->file('scan'));
        }

        $scientificActivity = ScientificActivity::find($id);
        $scientificActivity->student_id = $validated['student'];
        $scientificActivity->akademic_mark = $validated['akademic_mark'];
        $scientificActivity->scientific_mark = $validated['scientific_mark'];
        $scientificActivity->scan_added = $validated['scan_added'];
        $scientificActivity->scan = $path;
        $scientificActivity->save();
        return redirect('/scientificactivity/accrued_points');
    }

    public function deleteScientificActivity($id)
    {
        $scientificActivity = ScientificActivity::where('id', $id)->delete();
        return redirect('/scientificactivity/accrued_points');
    }

    public function getScan ($id)
    {
        $scientificActivity = ScientificActivity::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
         ];
        //dd(Storage::disk('local')->get($scientificActivity->scan));
        return response()->download(Storage::disk('local')->path($scientificActivity->scan), 'filename.pdf', $headers);   
    }
}
