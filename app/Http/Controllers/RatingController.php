<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Finance;
use App\Models\Group;
use App\Models\Rating;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class RatingController extends Controller
{
    //
    public function index()
    {
        $students = DB::select('SELECT finances.title, students.fullname, total_rating.* FROM total_rating 
        Join students on total_rating.student_id = students.id
        Join finances on total_rating.finance_id = finances.id');
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('progress.rating')->with(['courses' => $courses, 'departments' => $departments, 'groups' => $groups, 'students' => $students]);
    }

    public function addRating()
    {
        $finances = Finance::all();
        $students = Student::all();
        return View::make('forms.add_rat')->with(['finances' => $finances, 'students' => $students]);
    }

    public function createRating(Request $request)
    {
        $validated = $request->validate([
            'finance' => 'required|numeric',
            'student' => 'required|numeric',
            'total_mark' => 'required|numeric',
            'credit' => 'required|numeric',
            'exam' => 'required|numeric',
            'session_done' => 'required|numeric',
        ]);
        $rating = new Rating();
        $rating->finance_id = $validated['finance'];
        $rating->student_id = $validated['student'];
        $rating->total_mark = $validated['total_mark'];
        $rating->credit = $validated['credit'];
        $rating->exam = $validated['exam'];
        $rating->session_done = $validated['session_done'];
        $rating->save();
        return redirect('/progress/rating');
    }

    public function editRating($id)
    {
        $finances = Finance::all();
        $rating = Rating::find($id);
        $students = Student::all();
        return View::make('forms.edit_rat')->with(['finances' => $finances,'students' => $students, 'rating' => $rating]);
    }

    public function updateRating(Request $request, $id)
    {
        $validated = $request->validate([
            'finance' => 'required|numeric',
            'student' => 'required|numeric',
            'total_mark' => 'required|numeric',
            'credit' => 'required|numeric',
            'exam' => 'required|numeric',
            'session_done' => 'required|numeric',
        ]);

        $rating = Rating::find($id);
        $rating->finance_id = $validated['finance'];
        $rating->student_id = $validated['student'];
        $rating->total_mark = $validated['total_mark'];
        $rating->credit = $validated['credit'];
        $rating->exam = $validated['exam'];
        $rating->session_done = $validated['session_done'];
        $rating->save();
        return redirect('/progress/rating');
    }

    public function deleteRating($id)
    {
        $rating = Rating::where('id', $id)->delete();
        return redirect('/progress/rating');
    }
}
