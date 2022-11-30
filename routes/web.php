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
use App\Http\Controllers\backend\PointController;
use App\Http\Controllers\backend\QuizController;
use App\Http\Controllers\backend\HomeworkController;
use App\Http\Controllers\backend\MarkController;
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
    return view('pages.auth.login');
});
Route::group(['middleware'=> CheckLogin::class,'namespace' => 'frontend'], function () {
    route::get('user/{user_id}/course', [FrontendController::class, 'getCourse'])->name('frontend.course');
    route::get('user/{user_id}/class/{class_id}/course/{id}/lesson', [FrontendController::class, 'getLesson'])->name('frontend.lesson');
    route::get('user/{user_id}/class/{class_id}/course/{course_id}/lesson/{id}', [FrontendController::class, 'getUnit'])->name('frontend.unit');
    Route::get('user/{user_id}/class/{class_id}/course/{course_id}/lesson/{unit_id}/quiz/{id}', [FrontendController::class,'showQuiz'])->name('frontend.quiz');
    Route::post('user/{user_id}/class/{class_id}course/{course_id}/lesson/{unit_id}/quiz/{id}', [FrontendController::class,'showResult'])->name('frontend.result');
    route::get('user/{user_id}/class/{class_id}/course/{course_id}/lesson/{unit_id}/homework/{id}',[FrontendController::class,'showHW'])->name('frontend.homework');
    route::post('user/{user_id}/class/{class_id}/course/{course_id}/lesson/{unit_id}/homework/{id}',[FrontendController::class,'postHW'])->name('frontend.posthomework');
    Route::any('/createmeetingsupport',[ZoomController::class,'postCreateSupport'])->name('zoom.support');
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
    route::get('/', [BackendController::class, 'index'])->name('backend.home');
    route::get('/pre_course', [BackendController::class, 'getCourse']);

    //course    
    route::get('/course', [CourseController::class, 'getCourse'])->name('course.main');
    route::get('/course/{id}', [CourseController::class, 'showCourse'])->name('course.show');
    route::post('/createcourse', [CourseController::class, 'postcreateCourse'])->name('course.store');
    route::post('/editcourse/{id}', [CourseController::class, 'editCourse'])->name('course.update');
    route::get('/deletecourse/{id}', [CourseController::class, 'deleteCourse'])->name('course.delete');

    //class
    route::get('course/{course_id}/class', [ClassController::class, 'getClass'])->name('class.main');
    route::get('course/{course_id}/class/{id}', [ClassController::class, 'showClass'])->name('class.show');
    route::post('course/{course_id}/createclass', [ClassController::class, 'createClass'])->name('class.store');
    route::put('course/{course_id}/editclass/{id}', [ClassController::class, 'editClass'])->name('class.update');
    route::get('course/{course_id}/deleteclass/{id}', [ClassController::class, 'deleteClass'])->name('class.delete');
    route::get('course/{course_id}/class/detail/{id}', [ClassController::class, 'getDetailClass'])->name('class.detail');
    route::get('course/{course_id}/class/{id}/addstudent', [ClassController::class, 'getAddStudent']);
    route::post('course/{course_id}/class/{id}/addstudent', [ClassController::class, 'postaddStudent'])->name('class.addstudent');
    
    //point
    route::get('course/{course_id}/class/{class_id}/point', [PointController::class, 'getPoint'])->name('point.main');
    route::get('course/{course_id}/class/{class_id}/point/{id}', [PointController::class, 'editPoint'])->name('point.edit');
    route::post('course/{course_id}/class/{class_id}/point/{id}', [PointController::class, 'postEditPoint'])->name('point.postedit');

    //mark score
    route::get('mark',[MarkController::class,'Index'])->name('mark.index');
    route::get('mark/class/{id}/unit',[MarkController::class,'IndexUnit'])->name('mark.class');
    route::get('mark/class/{class_id}/unit/{id}/students',[MarkController::class,'IndexStudents'])->name('mark.unit');

    //Statistic
    route::get('static', [PointController::class, 'StaticIndex'])->name('static.index');
    route::get('static/{id_class}', [PointController::class, 'StaticView'])->name('static.view');
 //   route::get('course/{course_id}/class/{class_id}/static', [PointController::class, 'getStatic'])->name('static.main');
    // Route::get('static', function () {
    //     return view('pages.backend.statistic.index');
    // });

    //unit
    route::get('/course/{course_id}/unit', [UnitController::class, 'getUnit'])->name('unit.main');
    route::get('/course/{course_id}/unit/{id}', [UnitController::class, 'showUnit'])->name('unit.show');
    route::post('/course/{course_id}/createunit', [UnitController::class, 'postcreateUnit'])->name('unit.store');
    route::put('/course/{course_id}/unit/edit/{id}', [UnitController::class, 'posteditUnit'])->name('unit.update');
    route::get('/course/{course_id}/unit/delete/{id}', [UnitController::class, 'deleteUnit'])->name('unit.delete');

    //slide
    route::get('course/{course_id}/slide', [SlideController::class, 'getSlide'])->name('slide.main');
    route::get('course/{course_id}/slide/{id}', [SlideController::class, 'showSlide'])->name('slide.show');
    route::post('course/{course_id}/createslide', [SlideController::class, 'postcreateSlide'])->name('slide.store');
    route::post('course/{course_id}/editslide/{id}', [SlideController::class, 'posteditSlide'])->name('slide.update');
    route::get('course/{course_id}/deleteslide/{id}', [SlideController::class, 'deleteSlide'])->name('slide.delete');
    

    //test
    route::get('/test', [UserController::class, 'index']);

    //user
    route::get('/user', [UserController::class, 'getUser'])->name('user.main');
    route::get('/user/{id}', [UserController::class, 'showUser'])->name('user.show');
    route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    route::post('user/import', [UserController::class, 'Import'])->name('user.import');

    //teacher
    route::get('/teacher', [TeacherController::class, 'getTeacher'])->name('teacher.main');
    route::get('/teacher/{id}', [TeacherController::class, 'showTeacher'])->name('teacher.show');
    route::post('/teacher/create', [TeacherController::class, 'store'])->name('teacher.store');
    route::put('/teacher/edit/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    route::get('/teacher/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
    route::post('/teacher/import', [TeacherController::class, 'Import'])->name('teacher.import');

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
    Route::get('/meeting/{id}',[ZoomController::class,'get'])->where('id', '[0-9]+');
    Route::patch('/meeting/{id}',[ZoomController::class,'update'])->where('id', '[0-9]+');
    Route::delete('/meeting/{id}',[ZoomController::class,'delete'])->where('id', '[0-9]+');

    //zoom support
    Route::get('/zoomsupport',[ZoomController::class,'getZoomSupport']);
    Route::get('/createmeetingsupport',[ZoomController::class,'getCreateSupport']);;
    
    Route::delete('/meetingsupport/{id}',[ZoomController::class,'deletesupport'])->where('id', '[0-9]+');
    


    //homework
    route::get('course/{course_id}/homework', [HomeworkController::class, 'getHomework'])->name('homework.main');
    route::get('course/{course_id}/homework/{id}', [HomeworkController::class, 'showHomework'])->name('homework.show');
    route::post('course/{course_id}/createhomework', [HomeworkController::class, 'postcreateHomework'])->name('homework.store');
    route::put('course/{course_id}/edithomework/{id}', [HomeworkController::class, 'posteditHomework'])->name('homework.update');
    route::get('course/{course_id}/deletehomework/{id}', [HomeworkController::class, 'deleteHomework'])->name('homework.delete');
    
    //quiz
    Route::get('course/{course_id}/quiz', [QuizController::class,'index'])->name('quiz.main');
    Route::get('course/{course_id}/quiz/{id}', [QuizController::class,'show'])->name('quiz.show');
    Route::get('course/{course_id}/quiz/{id}/show', [QuizController::class,'detail'])->name('quiz.detail');
    Route::post('course/{course_id}/createquiz', [QuizController::class,'store'])->name('quiz.store');
    Route::delete('course/{course_id}/quiz/{id}', [QuizController::class,'destroy'])->name('quiz.destroy');
    // //code
    // route::get('/code', [CodeController::class, 'getCode']);
    // route::get('/createcode', [CodeController::class, 'getcreateCode']);
    // route::post('/submitcode', [CodeController::class, 'postCode']);
});
