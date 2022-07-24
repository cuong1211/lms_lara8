<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\UnitController;
use App\Http\Controllers\frontend\FrontendController;
use App\Models\Course;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SlideController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\backend\QuizController;
use App\Http\Middleware\checkAdminLogin;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\ZoomController;
use App\Http\Middleware\CheckLogin;

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
Route::group(['middleware'=> CheckLogin::class,'namespace' => 'frontend'], function () {
    route::get('/course', [FrontendController::class, 'getCourse']);
    route::get('/course/{id}/lesson', [FrontendController::class, 'getLesson']);
    route::get('/course/{course_id}/lesson/{id}', [FrontendController::class, 'getUnit']);
    Route::get('course/{course_id}/lesson/{unit_id}/quiz/{id}', [FrontendController::class,'showQuiz']);
    Route::post('course/{course_id}/lesson/{unit_id}/quiz/{id}', [FrontendController::class,'showResult']);
});
route::group(['Middleware'=>['web'],['api']], function () {
    route::get('/login', [LoginController::class, 'getLogin']);
    route::post('/login', [LoginController::class, 'postLogin']);
    route::get('/logout', [LoginController::class, 'getLogout']);
    
    //register
    route::get('admin/register', [RegisterController::class, 'getRegister']);
    route::post('admin/register', [RegisterController::class, 'postRegister']);
});
//login

Route::group(['middleware' => checkAdminLogin::class, 'prefix' => 'admin', 'namespace' => 'backend'], function () {
    //backend
    route::get('/', [BackendController::class, 'index']);

    //course    
    route::get('/course', [CourseController::class, 'getCourse']);
    route::get('/createcourse', [CourseController::class, 'getcreateCourse']);
    route::post('/createcourse', [CourseController::class, 'postcreateCourse']);
    route::get('/editcourse/{id}', [CourseController::class, 'getEditCourse']);
    route::post('/editcourse/{id}', [CourseController::class, 'editCourse']);
    route::get('/deletecourse/{id}', [CourseController::class, 'deleteCourse']);

    //class
    route::get('course/{id}/class', [ClassController::class, 'getClass']);
    route::get('course/{course_id}/createclass', [ClassController::class, 'getcreateClass']);
    route::post('course/{course_id}/createclass', [ClassController::class, 'createClass']);
    route::get('course/{course_id}/editclass/{id}', [ClassController::class, 'getEditClass']);
    route::post('course/{course_id}/editclass/{id}', [ClassController::class, 'editClass']);
    route::get('course/{course_id}/deleteclass/{id}', [ClassController::class, 'deleteClass']);
    route::post('course/{course_id}/class/import', [ClassController::class, 'Import']);
    
    //unit
    route::get('/course/{id}/unit', [UnitController::class, 'getUnit']);
    route::get('/course/{course_id}/createunit', [UnitController::class, 'getcreateUnit']);
    route::post('/course/{course_id}/createunit', [UnitController::class, 'postcreateUnit']);
    route::get('/course/{course_id}/unit/{id}/edit', [UnitController::class, 'getEditUnit']);
    route::post('/course/{course_id}/unit/{id}/edit', [UnitController::class, 'posteditUnit']);
    route::get('/course/{course_id}/unit/{id}/delete', [UnitController::class, 'deleteUnit']);

    //slide
    route::get('course/{id}/slide', [SlideController::class, 'getSlide']);
    route::get('course/{course_id}/createslide', [SlideController::class, 'getcreateSlide']);
    route::post('course/{course_id}/createslide', [SlideController::class, 'postcreateSlide']);
    route::get('course/{course_id}/editslide/{id}', [SlideController::class, 'getEditSlide']);
    route::post('course/{course_id}/editslide/{id}', [SlideController::class, 'editSlide']);
    route::get('course/{course_id}/deleteslide/{id}', [SlideController::class, 'deleteSlide']);
    

    //test
    route::get('/test', [UserController::class, 'index']);

    //user
    route::get('/user', [UserController::class, 'getUser'])->name('user.main');
    route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    route::post('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
    route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

    //teacher
    route::get('/teacher', [TeacherController::class, 'getTeacher'])->name('teacher.main');
    route::get('/teacher/create', [TeacherController::class, 'create']);
    route::post('/teacher/create', [TeacherController::class, 'store'])->name('teacher.store');
    route::get('/teacher/{id}/edit', [TeacherController::class, 'edit']);
    route::post('/teacher/{id}/edit', [TeacherController::class, 'update']);
    route::get('/teacher/{id}/delete', [TeacherController::class, 'destroy']);

    //role
    route::get('/role', [RoleController::class, 'getRole'])->name('role.main');
    route::get('/role/create', [RoleController::class, 'create']);
    route::post('/role/create', [RoleController::class, 'store']);
    route::get('/role/{id}/edit', [RoleController::class, 'edit']);
    route::post('/role/{id}/edit', [RoleController::class, 'update']);
    route::get('/role/{id}/delete', [RoleController::class, 'delete']);

    //zoom  
    Route::get('/meeting',[ZoomController::class,'getList']);
    Route::get('/zoom',[ZoomController::class,'getZoom'])->name('zoom.main');
    Route::get('/creatmeetings',[ZoomController::class,'getCreate']);
    Route::post('/creatmeetings',[ZoomController::class,'postCreate']);
    Route::get('/createmeetingsupport',[ZoomController::class,'getCreateSupport']);
    Route::post('/createmeetingsupport',[ZoomController::class,'postCreateSupport']);
    Route::get('/meeting/{id}',[ZoomController::class,'get'])->where('id', '[0-9]+');
    Route::patch('/meeting/{id}',[ZoomController::class,'update'])->where('id', '[0-9]+');
    Route::delete('/meeting/{id}',[ZoomController::class,'delete'])->where('id', '[0-9]+');

    //zoom support
    Route::get('/zoomsupport',[ZoomController::class,'getZoomSupport']);
    Route::get('/meetingsupport/{id}',[ZoomController::class,'getsupport'])->where('id', '[0-9]+');
    Route::patch('/meetingsupport/{id}',[ZoomController::class,'updatesupport'])->where('id', '[0-9]+');
    Route::delete('/meetingsupport/{id}',[ZoomController::class,'deletesupport'])->where('id', '[0-9]+');
    


    //homework
    route::get('/homework', [HomeworkController::class, 'getHomework']);
    route::get('/createhomework', [HomeworkController::class, 'getcreateHomework']);
    route::post('/createhomework', [HomeworkController::class, 'postcreateHomework']);
    route::get('/edithomework/{id}', [HomeworkController::class, 'getEditHomework']);
    route::post('/edithomework/{id}', [HomeworkController::class, 'editHomework']);
    route::get('/deletehomework/{id}', [HomeworkController::class, 'deleteHomework']);
    
    //quiz
    Route::get('course/{id}/quiz', [QuizController::class,'index']);
    Route::get('course/{course_id}/quiz/{id}/show', [QuizController::class,'show']);
    Route::get('course/{course_id}/createquiz', [QuizController::class,'create']);
    Route::post('course/{course_id}/createquiz', [QuizController::class,'store']);
    
    Route::delete('course/{course_id}/{quiz}', [QuizController::class,'destroy']);
    // //quiz
    // route::get('/quiz', [TestController::class, 'getTest']);
    // route::get('/createquiz', [TestController::class, 'getcreateTest']);
    // route::post('/createquiz', [TestController::class, 'postcreateTest']);
    // route::get('/detal/{quiz}', [TestController::class, 'detalTest']);
    // route::post('/result/{quiz}', [TestController::class, 'resultTest']);

    // //code
    // route::get('/code', [CodeController::class, 'getCode']);
    // route::get('/createcode', [CodeController::class, 'getcreateCode']);
    // route::post('/submitcode', [CodeController::class, 'postCode']);
});
