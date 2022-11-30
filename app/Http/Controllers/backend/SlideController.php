<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Course;
use App\models\Unit;
use App\models\Slide;
use Yajra\Datatables\Datatables;

class SlideController extends Controller
{
    public function getSlide($course_id){
        
        return view('pages.backend.slide.main',compact('course_id'));
    }
    public function showSlide($course_id,$id){
        switch ($id) {
            case 'get-list':
                $slide = Slide::query()->where('course_id',$course_id);
                return Datatables::of($slide)->make(true);
                break;
            default:
                break;
        }
    }
    public function postcreateSlide(request $request, $course_id){
        $link_embed= str_replace('pub','embed',$request->link);
        $slide = Slide::create([
            'title'=>$request->title,
            'link'=>$link_embed,   
            'course_id'=>$course_id,
        ]);
        if($slide){
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
    public function posteditSlide(request $request,$course_id,$id){
        $slide = Slide::query()->find($id);
        $slide->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'course_id'=>$request->course_id,
            'unit_id'=>$request->unit_id,
        ]);
        if($slide){
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
    public function deleteSlide($course_id,$id){
        $slide = Slide::query()->find($id);
        $slide->delete();
        if($slide){
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
