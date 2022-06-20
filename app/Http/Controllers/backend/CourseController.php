<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function getCourse(){
        $course = Course::query()->get();
        return view('pages.backend.course.main',compact('course'));
    }
    public function getcreateCourse(){
        return view('pages.backend.course.create');
    }
    public function postcreateCourse(request $request){
        $course = new Course;
        $course->name = $request->name;
        $course->start_time = $request->start_time;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            Image::make($file)->resize(491,246)->save(public_path('backend/uploads/courses/'.$name)); 
            $course->img = $name;
        }
        $course->save();
        return redirect('/admin/course');
    }
    public function getEditCourse($id){
        $course = Course::query()->find($id);
        return view('pages.backend.course.edit',compact('course'));
    }
    public function editCourse(request $request,$id){
        $course = Course::query()->find($id);
        $course->update([
            'name'=>$request->name,
            'start_time'=>$request->start_time,
        ]);
        return redirect()->back();
    }
    public function deleteCourse($id){
        $course = Course::query()->find($id);
        $course->delete();
        return redirect()->back();
    }
}
