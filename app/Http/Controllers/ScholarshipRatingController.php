<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ScholarshipRatingController extends Controller
{
    //
    public function index(){
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('progress.scholarship_rating')->with(['departments' => $departments,'courses' => $courses, 'groups' => $groups]);
    }
}
