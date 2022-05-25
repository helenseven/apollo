<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->department !== null && $request->course !== null && $request->group !== null) {
            $query = 'SELECT
            students.id, students.fullname, students.card_number, students.zalikovka_number 
             FROM students 
           
           WHERE students.department_id = ' . $request->department
                . ' AND students.course_id = ' . $request->course
                . ' AND students.group_id = ' . $request->group;
                $students = DB::select($query);
                $departmentId = $request->department;
                $courseId = $request->course;
                $groupId = $request->group;
        }else {
            $students = [];
            $departmentId = 0;
            $courseId = 0;
            $groupId = 0;
           
        }
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('list.group')->with([
            'courses' => $courses, 
            'departments' => $departments,
            'groups' => $groups,
            'students' => $students,
            'departmentId' => $departmentId,
            'groupId' => $groupId,
            'courseId' => $courseId
        ]);
    }

    public function addStudent()
    {
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('forms.add_st')->with(['departments' => $departments, 'courses' => $courses, 'groups' => $groups]);
    }

    public function createStudent(Request $request)
    {
        $validated = $request->validate([
            'department' => 'required|numeric',
            'course' => 'required|numeric',
            'group' => 'required|numeric',
            'fullname' => 'required|max:255',
            'card_number' => 'required|numeric',
            'zalikovka_number' => 'required|numeric',
            'benefit' => 'required|numeric'
        ]);


        $student = new Student();
        $student->department_id = $validated['department'];
        $student->course_id = $validated['course'];
        $student->group_id = $validated['group'];
        $student->fullname = $validated['fullname'];
        $student->card_number = $validated['card_number'];
        $student->zalikovka_number = $validated['zalikovka_number'];
        $student->benefit = $validated['benefit'];
        $student->save();
        return redirect('/list/group');
    }

    public function editStudent($id)
    {
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        $student = Student::find($id);
        return View::make('forms.edit_st')->with(['departments' => $departments, 'courses' => $courses, 'groups' => $groups, 'student' => $student]);
    }

    public function updateStudent(Request $request, $id)
    {
        $validated = $request->validate([
            'department' => 'required|numeric',
            'course' => 'required|numeric',
            'group' => 'required|numeric',
            'fullname' => 'required|max:255',
            'card_number' => 'required|numeric',
            'zalikovka_number' => 'required|numeric',
            'benefit' => 'required|numeric'
        ]);

        $student = Student::find($id);
        $student->department_id = $validated['department'];
        $student->course_id = $validated['course'];
        $student->group_id = $validated['group'];
        $student->fullname = $validated['fullname'];
        $student->card_number = $validated['card_number'];
        $student->zalikovka_number = $validated['zalikovka_number'];
        $student->benefit = $validated['benefit'];
        $student->save();
        return redirect('/list/group');
    }

    public function deleteStudent($id)
    {
        $student = Student::where('id', $id)->delete();
        return redirect('/list/group');
    }
}
