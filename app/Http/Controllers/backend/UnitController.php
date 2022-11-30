<?php

namespace App\Http\Controllers\backend;
 
use App\Http\Controllers\Controller;
use App\models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;
use App\models\Unit;
use App\models\Slide;
use App\models\Quiz;
use Yajra\Datatables\Datatables;

class UnitController extends Controller
{
    public function getUnit($course_id){
        $slide = Slide::query()->where('course_id',$course_id)->get();
        $quiz = Quiz::query()->where('course_id',$course_id)->get();
        $homework = Homework::query()->where('course_id',$course_id)->get();
        return view('pages.backend.unit.main',compact('slide','quiz','homework','course_id'));
    }
    public function showUnit($course_id,$id){
        switch ($id) {
            case 'get-list':
                $unit = Unit::query()->where('course_id',$course_id)->with('slide','quiz','homework');
                return Datatables::of($unit)->make(true);
                break;
            default:
                break;
        }
    }
    public function postcreateUnit(request $request, $course_id){
        $unit = Unit::create([
            'course_id'=>$course_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'course_id'=>$request->course_id,
            'slide_id'=>$request->slide_id,
            'homework_id'=>$request->homework_id,
            'quizzes_id'=>$request->quizzes_id,
        ]);
        if($unit){
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Thêm thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Thêm thất bại'
                ]
            );
        };
    }
    public function posteditUnit(request $request,$course_id,$id){
        $unit = Unit::find($id);
        $unit->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'course_id'=>$course_id,
            'slide_id'=>$request->slide_id,
            'quizzes_id'=>$request->quizzes_id,
            'homework_id'=>$request->homework_id,
        ]);
        if($unit){
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Sửa thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Sửa thất bại'
                ]
            );
        };
    }
    public function deleteUnit($course_id,$id){
        $unit = Unit::find($id);
        $unit->delete();
        if($unit){
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Xoá thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Xoá thất bại'
                ]
            );
        };
    }
    
}
