<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Course;
use App\models\Unit;
use App\models\Homework;

class HomeworkController extends Controller
{
    public function getHomework($id){
        $homework = Homework::query()->where('course_id',$id)->get();
        $course= Course::find($id);
        return view('pages.backend.homework.main',compact('homework','course'));
    }
    public function getcreateHomework($id){
        $course = Course::find($id);
        return view('pages.backend.homework.create',compact('course'));
    }
    public function postcreateHomework(request $request, $id){
        $homework = Homework::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'course_id'=>$id
        ]);
        return redirect(('/admin/course').'/'.$id.'/homework');
    }
    public function getEditHomework($course_id,$id){
        $homework = Homework::query()->find($id);
        $course = Course::find($course_id);
        $unit = Unit::query()->get();
        return view('pages.backend.homework.edit',compact('homework','course','unit'));
    }
    public function posteditHomework(request $request,$course_id,$id){
        $homework = Homework::query()->find($id);
        $homework->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'course_id'=>$request->course_id,
            'unit_id'=>$request->unit_id,
        ]);
        return redirect(('/admin/course').'/'.$course_id.'/homework');
    }
    public function deleteHomework($course_id,$id){
        $homework = Homework::query()->find($id);
        $homework->delete();
        return redirect(('/admin/course').'/'.$course_id.'/homework');
    }

}
