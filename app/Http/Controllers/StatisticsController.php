<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
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

            $socialCount = 0;
            foreach($students as $student) {
                if ($student->benefit == 1) {
                    $socialCount++;
                }
            }

            $upperScholarship = intval(round(count($students) * 0.1));
            $scholarshipAmount = intval(round(count($students) * 0.4)) - $upperScholarship; 
            $other = count($students) - $scholarshipAmount - $socialCount - $upperScholarship;
        } else {
            $other = 0;
            $scholarshipAmount = 0;
            $upperScholarship = 0;
            $socialCount = 0;
            $departmentId = 0;
            $courseId = 0;
            $groupId = 0;
        }
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('progress.statistics')->with([
            'courses' => $courses,
            'departments' => $departments,
            'groups' => $groups,
            'other' => $other,
            'upperScholarship' => $upperScholarship,
            'scholarshipAmount' => $scholarshipAmount,
            'socialCount' => $socialCount,
            'departmentId' => $departmentId,
            'groupId' => $groupId,
            'courseId' => $courseId
        ]);
    }
}
