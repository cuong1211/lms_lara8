<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Course;
use App\models\Unit;
use App\models\Slide;

class SlideController extends Controller
{
    public function getSlide($id){
        $slide = Slide::query()->where('course_id',$id)->get();
        $course= Course::find($id);
        return view('pages.backend.slide.main',compact('slide','course'));
    }
    public function getcreateSlide($course_id){
        $course = Course::find($course_id);
        return view('pages.backend.slide.create',compact('course'));
    }
    public function postcreateSlide(request $request, $course_id){
        $link_embed= str_replace('pub','embed',$request->link);
        $slide = Slide::create([
            'title'=>$request->title,
            'link'=>$link_embed,
            'course_id'=>$request->course_id,
        ]);
        return redirect(('/admin/course').'/'.$course_id.'/slide');
    }
    public function getEditSlide($course_id,$id){
        $slide = Slide::query()->find($id);
        $course = Course::find($course_id);
        $unit = Unit::query()->get();
        return view('pages.backend.slide.edit',compact('slide','course','unit'));
    }
    public function posteditSlide(request $request,$course_id,$id){
        $slide = Slide::query()->find($id);
        $slide->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'course_id'=>$request->course_id,
            'unit_id'=>$request->unit_id,
        ]);
        return redirect(('/admin/course').'/'.$course_id.'/slide');
    }
    public function deleteSlide($course_id,$id){
        $slide = Slide::query()->find($id);
        $slide->delete();
        return redirect(('/admin/course').'/'.$course_id.'/slide');
    }

}
