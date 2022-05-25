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
use Illuminate\Support\Facades\Storage;

class CreativeActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->department !== null && $request->course !== null && $request->group !== null) {
            $query = 'SELECT
           finances.title, students.fullname, total_rating.*, 
           creative_activities.public_mark, creative_activities.creat_achieviment_mark,
           creative_activities.scan_added
            FROM total_rating 
            Join students on total_rating.student_id = students.id
            Join finances on total_rating.finance_id = finances.id
            Join creative_activities on creative_activities.student_id = students.id
            WHERE total_rating.finance_id = 1
                AND students.department_id = ' . $request->department
                . ' AND students.course_id = ' . $request->course
                . ' AND students.group_id = ' . $request->group;

            $students = DB::select($query);
            $departmentId = $request->department;
            $courseId = $request->course;
            $groupId = $request->group;
        }else{
            $students = [];
            $departmentId = 0;
            $courseId = 0;
            $groupId = 0;
        }
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('creativework.accrued_points')->with([
            'courses' => $courses, 
            'departments' => $departments, 
            'groups' => $groups,
            'students' => $students,
            'departmentId' => $departmentId,
            'groupId' => $groupId,
            'courseId' => $courseId
             ]);
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
            'scan' => 'mimes:pdf|max:20000'
        ]);
        $path = '';

        if ($request->file('scan') !== null && $request->file()) {
            $path = Storage::disk('local')->put('.', $request->file('scan'));
        }
        $creativeActivity = new CreativeActivity();
        $creativeActivity->student_id = $validated['student'];
        $creativeActivity->public_mark = $validated['public_mark'];
        $creativeActivity->creat_achieviment_mark = $validated['creat_achieviment_mark'];
        $creativeActivity->scan_added = $validated['scan_added'];
        $creativeActivity->scan = $path;
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
            'scan' => 'mimes:pdf|max:20000'
        ]);

        $path = '';

        if ($request->file('scan') !== null && $request->file()) {
            $path = Storage::disk('local')->put('.', $request->file('scan'));
        }

        $creativeActivity = CreativeActivity::find($id);
        $creativeActivity->student_id = $validated['student'];
        $creativeActivity->public_mark = $validated['public_mark'];
        $creativeActivity->creat_achieviment_mark = $validated['creat_achieviment_mark'];
        $creativeActivity->scan_added = $validated['scan_added'];
        $creativeActivity->scan = $path;
        $creativeActivity->save();
        return redirect('/creativework/accrued_points');
    }

    public function deleteCreativeActivity($id)
    {
        $creatActivity = CreativeActivity::where('id', $id)->delete();
        return redirect('/creativework/accrued_points');
    }

    public function getScan ($id)
    {
        $creativeActivity = CreativeActivity::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
         ];
        //dd(Storage::disk('local')->get($scientificActivity->scan));
        return response()->download(Storage::disk('local')->path($creativeActivity->scan), 'filename.pdf', $headers);   
    }

}
