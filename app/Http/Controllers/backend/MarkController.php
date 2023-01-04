<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Unit;
use App\Models\class_user;
use App\Models\Homework_class;
use App\Models\User;

class MarkController extends Controller
{
    public function Index(){
        $class = Classes::query()->get();
        return view('pages.backend.homework.index_mark',compact('class'));
    }
    public function IndexUnit($id){
        $class = Classes::find($id)->course_id;
        $unit = Unit::query()->where('course_id',$class)->get();
        return view('pages.backend.homework.unit_mark',compact('unit','id'));
    }
    public function IndexStudents($class_id,$id){
        $students= class_user::query()->where('class_id',$class_id)->with('user')->get();
        $homework_class=Homework_class::query()->where('unit_id',$id)->with('user')->get();
        //query lấy ra những sinh viên có trong lớp và có bài tập
        // dd($students);
        // $students = $students->intersect($homework_class);
        
        // dd($students,$homework_class);
        
        return view('pages.backend.homework.class_mark',compact('students','homework_class'));
    }
}
