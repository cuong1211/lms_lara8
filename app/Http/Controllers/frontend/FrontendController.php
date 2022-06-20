<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Unit;

class FrontendController extends Controller
{
    public function index(){
        $course = Course::all();
        return view('pages.frontend.main',compact('course'));
    }
    public function getLesson($id){
        $unit = Unit::query()->where('course_id',$id)->get();
        $course = Course::find($id);
        return view('pages.frontend.lesson',compact('unit','course'));
    }
    public function getUnit($course_id,$id){
        $unit = Unit::query()->find($id);
        $course = Course::find($course_id);
        return view('pages.frontend.unit',compact('unit','course'));

    }

}
