<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ScientificActivityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CreativeActivityController;
use App\Http\Controllers\ScholarshipRatingController;
use App\Http\Controllers\WorkplanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
//StudentList
Route::get('/list/group', [StudentController::class, 'index'])->name('list.group');
Route::post('/student/update/{id}', [StudentController::class, 'updateStudent'])->name('student.update');
Route::get('/list/student/delete/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');
//ChairList
Route::get('/list/chair', [ChairController::class, 'index'])->name('list.chair');
Route::post('/chair-worker/update/{id}', [ChairController::class, 'updateChairWorker'])->name('chair_worker.update');
Route::get('/list/chair-worker/delete/{id}', [ChairController::class, 'deleteChairWorker'])->name('chair_worker.delete');
//Rating
Route::get('/progress/rating', [RatingController::class, 'index'])->name('progress.rating');
Route::post('/rating/update/{id}', [RatingController::class, 'updateRating'])->name('rating.update');
Route::get('/progress/rating/delete/{id}', [RatingController::class, 'deleteRating'])->name('rating.delete');
//ScientificActivityAccruedPoints
Route::get('/scientificactivity/accrued_points', [ScientificActivityController::class, 'index'])->name('scientificactivity.accrued_points');
Route::post('/scientificactivity/accrued_points/update/{id}', [ScientificActivityController::class, 'updateScientificActivity'])->name('accrued_scientific_points.update');
Route::get('/scientificactivity/accrued_points/delete/{id}', [ScientificActivityController::class, 'deleteScientificActivity'])->name('accrued_scientific_points.delete');
//CreativeActivityAccruedPoints
Route::get('/creativework/accrued_points', [CreativeActivityController::class, 'index'])->name('creativework.accrued_points');
Route::get('/creativework/accrued_points/delete/{id}', [CreativeActivityController::class, 'deleteCreativeActivity'])->name('accrued_creative_points.delete');
Route::post('/creativework/accrued_points/update/{id}', [CreativeActivityController::class, 'updateCreativeActivity'])->name('accrued_creative_points.update');
//ScholarshipRating
Route::get('/progress/scholarship_rating',  [ScholarshipRatingController::class, 'index'])->name('progress.scholarship_rating');
//Workplan
Route::get('/workplan/speciality', [WorkplanController::class, 'index'])->name('workplan.speciality');

//Forms
Route::prefix('forms')->group(function () {
    //ChairForms
    Route::get('/add_ch', [ChairController::class, 'addChair'])->name('forms.add_ch');
    Route::post('/create_ch', [ChairController::class, 'createChairWorker'])->name('forms.create_ch');
    Route::get('/edit_ch/{id}', [ChairController::class, 'editChair'])->name('forms.edit_ch');
    //StudentForms
    Route::get('/add_st', [StudentController::class, 'addStudent'])->name('forms.add_st');
    Route::post('/create_st', [StudentController::class, 'createStudent'])->name('forms.create_st');
    Route::get('/edit_st/{id}', [StudentController::class, 'editStudent'])->name('forms.edit_st');
    //RatingForms
    Route::get('/edit_rat/{id}', [RatingController::class, 'editRating'])->name('forms.edit_rat');
    Route::get('/add_rat', [RatingController::class, 'addRating'])->name('forms.add_rat');
    Route::post('/create_rat', [RatingController::class, 'createRating'])->name('forms.create_rat');
    //ScientificActivityForms
    Route::get('/edit_scientific_points/{id}', [ScientificActivityController::class, 'editScientificActivity'])->name('forms.scientific_points');
    Route::get('/add_scientific_points',[ScientificActivityController::class, 'addScientificActivity'])->name('forms.add_scientific_points');
    Route::post('/create_scientific_points', [ScientificActivityController::class, 'createScientificActivity'])->name('forms.create_scientific_points');
    //CreativeActivityForms
    Route::get('/edit_creative_points/{id}', [CreativeActivityController::class, 'editCreativeActivity'])->name('forms.creative_points');
    Route::post('/create_creative_points', [CreativeActivityController::class, 'createCreativeActivity'])->name('forms.create_creative_points');
    Route::get('/add_creative_points',[CreativeActivityController::class, 'addCreativeActivity'])->name('forms.add_creative_points');
    });

//Other
Route::get('/other/information', function () {
    return view('other.information');
});

//Statistics
Route::get('/progress/statistics', function () {
    return view('progress.statistics');
});
//ActivitiesRules
Route::get('/scientificactivity/rules', function () {
    return view('scientificactivity.rules');
});
Route::get('/creativework/rules', function () {
    return view('creativework.rules');
});

