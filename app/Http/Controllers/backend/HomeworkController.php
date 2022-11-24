<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Course;
use App\models\Unit;
use App\models\Homework;
use Yajra\Datatables\Datatables;

class HomeworkController extends Controller
{
    public function getHomework($course_id){
        return view('pages.backend.homework.main',compact('course_id'));
    }
    public function showHomework($course_id,$id){
        switch ($id) {
            case 'get-list':
                $homework = Homework::query()->where('course_id',$course_id);
                return Datatables::of($homework)->make(true);
                break;
            default:
                break;
        }
    }
    public function postcreateHomework(request $request, $course_id){
        $homework = Homework::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'course_id'=>$course_id
        ]);
        if($homework){
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
    public function posteditHomework(request $request,$course_id,$id){
        $homework = Homework::query()->find($id);
        $homework->update([
            'course_id'=>$course_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'course_id'=>$request->course_id,
            'unit_id'=>$request->unit_id,
        ]);
        // dd($homework);
        if($homework){
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
    public function deleteHomework($course_id,$id){
        $homework = Homework::find($id);
        $homework->delete();
        if($homework){
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
