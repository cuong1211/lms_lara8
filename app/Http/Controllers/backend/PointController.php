<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\point;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function getPoint($course_id, $class_id){
        $point = DB::table('points')
                 ->select('points.*', 'users.name as user_name')
                ->join('users', 'points.user_id', '=', 'users.id')
                ->where('class_id', '=', $class_id)
                //->groupByRaw('subject_id')
                //->join('points', 'assign_teachers.subject_id', '=', 'points.subject_id')
                ->get();
        //dd($point);
        return view('pages.backend.point.main', compact('point','course_id','class_id'));
    }
    public function editPoint($course_id, $class_id, $id){
        $point = DB::table('points')
                 ->select( 'users.name as user_name', 'points.id as point_id', 'points.*')
                ->join('users', 'points.user_id', '=', 'users.id')
                ->where('user_id', '=', $id)
                ->where('class_id', $class_id)
                //->groupByRaw('subject_id')
                //->join('points', 'assign_teachers.subject_id', '=', 'points.subject_id')
                ->get();
        // dd($point);
        return view('pages.backend.point.edit', compact('point','course_id','class_id','id'));
    }
    public function postEditPoint(Request $request, $course_id, $class_id, $id){
        $point = point ::where('class_id', $class_id)->where('user_id', $id)->first();
        // dd($point);
        $point->point_1 = $request->point_1;
        $point->point_2 = $request->point_2;
        $point->point_3 = $request->point_3;
        $point->save();
        return redirect()->route('point.main', ['course_id' => $course_id, 'class_id' => $class_id]);
    }
    public function StaticIndex(){
        $list_class = DB::table('class')
            ->select('class.name as class_name', 'course.name as course_name', 'class.id as id')
            ->join('course', 'class.course_id', '=', 'course.id')
            ->get();
       // dd($list_class);
        return view('pages.backend.statistic.index', compact('list_class'));
    }public function StaticView($class_id){
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
