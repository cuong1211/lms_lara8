<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\point;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class PointController extends Controller
{
    public function getPoint($course_id, $class_id){
        return view('pages.backend.point.main', compact('course_id','class_id'));
    }
    public function showPoint($course_id, $class_id, $id){
        switch ($id) {
            case 'get-list':
                $point = point::query()->where('class_id',$class_id)->with('user');
                return Datatables::of($point)->make(true);
                break;
            default:
                break;
        }
    }
    public function postEditPoint(Request $request, $course_id, $class_id, $id){
        $point = point::where('user_id',$id)->where('class_id',$class_id)->first();
        if($request->point_1 != Null){
            $point_1 = $request->point_1;
        }
        else{
            $point_1 = $point->point_1;
        }
        if($request->point_2 != null){
            $point_2 = $request->point_2;
        }
        else{
            $point_2 = $point->point_2;
        }
        if($request->point_3 != null){
            $point_3 = $request->point_3;
        }
        else{
            $point_3 = $point->point_3;
        }
        $point->update([
            'point_1' => $point_1,
            'point_2' => $point_2,
            'point_3' => $point_3,
        ]);
        if($point){
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Cập nhật thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Cập nhật thất bại'
                ]
            );
        };
    }
    public function StaticIndex(){
        $list_class = DB::table('class')
            ->select('class.name as class_name', 'course.name as course_name', 'class.id as id')
            ->join('course', 'class.course_id', '=', 'course.id')
            ->get();
       // dd($list_class);
        return view('pages.backend.statistic.index', compact('list_class'));
    }
    public function StaticView($class_id){
        $list_points = DB::table('points')
            // ->select('class.name as class_name', 'course.name as course_name', 'class.id as id')
            ->where('class_id', $class_id)
            ->get();
     //  dd($list_points);
       $btd = 0;
       $ktd = 0;
       $dad = 0;
       $siso = count($list_points);
       foreach ($list_points as  $value) {
        if ($value->point_1 >= 5) {
            $btd++;
        }
        if ($value->point_2 >= 5) {
            $ktd++;
        }
        if ($value->point_3 >= 5) {
            $dad++;
        }
       }

        return view('pages.backend.statistic.view', compact('btd','ktd','dad','siso'));
    }
}
