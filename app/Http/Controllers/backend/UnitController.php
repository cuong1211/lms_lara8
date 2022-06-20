<?php

namespace App\Http\Controllers\backend;
 
use App\Http\Controllers\Controller;
use App\models\Course;
use Illuminate\Http\Request;
use App\models\Unit;
use App\models\Slide;
use App\models\Quiz;
class UnitController extends Controller
{
    public function getUnit($id){
        $unit = Unit::query()->with('slide','quiz')->where('course_id',$id)->get();
        // $unit = Unit::query()->with('course','zoom','slide','quiz')->get();
        $course= Course::find($id);
        $slide = Slide::query()->get();
        $quiz = Quiz::query()->get();
        return view('pages.backend.unit.main',compact('unit','course','slide',"quiz"));
    }
    public function getcreateUnit($course_id){
        $course = Course::find($course_id);
        $slide = Slide::query()->get();
        $quiz= Quiz::query()->get();
        return view('pages.backend.unit.create',compact('course','slide','quiz'));
    }
    public function postcreateUnit(request $request, $course_id){
        $unit = Unit::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'course_id'=>$request->course_id,
            'slide_id'=>$request->slide_id,
            'quizzes_id'=>$request->quizzes_id,
        ]);
        return redirect(('/admin/course').'/'.$course_id.'/unit');
    }
    public function getEditUnit($course_id,$id){
        $unit = Unit::query()->find($id);
        $course = Course::find($course_id);
        $slide = Slide::query()->get();
        $quiz= Quiz::query()->get();
        return view('pages.backend.unit.edit',compact('unit','course','slide','quiz'));
    }
    public function posteditUnit(request $request,$course_id,$id){
        $unit = Unit::query()->find($id);
        $unit->update([
            'title'=>$request->title,
            'course_id'=>$request->course_id,
            'slide_id'=>$request->slide_id,
            'quizzes_id'=>$request->quizzes_id,
        ]);
        return redirect(('/admin/course').'/'.$course_id.'/unit');
    }
    public function deleteUnit($course_id,$id){
        $unit = Unit::query()->find($id);
        $unit->delete();
        return redirect(('/admin/course').'/'.$course_id.'/unit');
    }
    
}
