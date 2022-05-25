<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\Workplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class WorkplanController extends Controller
{
    //
    public function index(){
        $workplans = DB::select('SELECT chairs.title as chair_title, workplans.* FROM workplans 
        Join chairs on workplans.chair_id = chairs.id');
        $departments = Department::all();
        $courses = Course::all();
        $groups = Group::all();
        return View::make('workplan.speciality')->with(['courses' => $courses, 'departments' => $departments, 'groups' => $groups,'workplans' => $workplans]);
    }

}
