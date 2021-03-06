<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class ScholarshipRatingController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->department !== null && $request->course !== null && $request->group !== null) {
            $query = 'SELECT
            finances.title, students.fullname, students.benefit, students.id as student_id, total_rating.*,
            scientific_activities.akademic_mark, scientific_activities.scientific_mark,
            creative_activities.public_mark, creative_activities.creat_achieviment_mark
             FROM total_rating 
           Join students on total_rating.student_id = students.id
           Join finances on total_rating.finance_id = finances.id
           Join scientific_activities on scientific_activities.student_id = students.id
           Join creative_activities on creative_activities.student_id = students.id
           WHERE total_rating.finance_id = 1 
                    AND students.department_id = ' . $request->department
                . ' AND students.course_id = ' . $request->course
                . ' AND students.group_id = ' . $request->group;

            $students = DB::select($query);
            $departmentId = $request->department;
            $courseId = $request->course;
            $groupId = $request->group;

            foreach ($students as $student) {
                $student->additional_score = $student->akademic_mark + $student->creat_achieviment_mark
                    + $student->public_mark + $student->scientific_mark;
                $student->summary = $student->additional_score + $student->credit + $student->total_mark;
            }
            $studentsCollection = collect($students);
            $studentsCollection = $studentsCollection->sortByDesc('summary');
            $students = $studentsCollection->toArray();

            $scholarshipAmount = intval(round(count($students) * 0.4));
        } else {
            $students = [];
            $scholarshipAmount = 1;
            $departmentId = 0;
            $courseId = 0;
            $groupId = 0;
        }

        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('progress.scholarship_rating')->with([
            'departments' => $departments,
            'courses' => $courses,
            'groups' => $groups,
            'students' => $students,
            'scholarshipAmount' => $scholarshipAmount,
            'departmentId' => $departmentId,
            'groupId' => $groupId,
            'courseId' => $courseId
        ]);
    }

    public function getZvit()
    {

        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        //dd(Storage::disk('local')->get($scientificActivity->scan));
        return response()->download(Storage::disk('local')->path('zvit.xlsx'), 'zvit.xlsx', $headers);
    }
}
