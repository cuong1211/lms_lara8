<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;

class CourseController extends Controller
{
    public function getCourse(){
        return view('pages.backend.course.main');
    }
    public function showCourse($id){

        switch ($id) {
            case 'get-list':
                $course = Course::query();
                return Datatables::of($course)->make(true);
                break;
            default:
                break;
        }
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
        if($course){
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
    public function editCourse(request $request,$id){
        $course = Course::query()->find($id);
        $course->update([
            'name'=>$request->name,
            'start_time'=>$request->start_time,
        ]);
        if($course){
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
    public function deleteCourse($id){
        $course = Course::find($id);
        $course->delete();
        if($course){
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
