<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\class_user;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Classes;
use App\Models\point;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;


class ClassController extends Controller
{
    public function getClass($course_id)
    {
        $teacher = User::where('role_id', 2)->get();
        return view('pages.backend.class.main', compact('course_id', 'teacher'));
    }
    public function showClass($course_id,$id){
        switch ($id) {
            case 'get-list':
                $class = Classes::query()->where('course_id',$course_id)->with('user');
                return Datatables::of($class)->make(true);
                break;
            default:
                break;
        }
    } 
    public function createClass(request $request, $course_id)
    {
        $class = Classes::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
        ]);
        if ($class) {
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
    public function editClass(request $request, $course_id, $id)
    {
        $class = Classes::find($id);
        $class->course_id = $course_id;
        $class->name = $request->name;
        $class->user_id = $request->user_id;
        $class->save();
        if ($class) {
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
    public function getDetailClass($course_id, $class_id)
    {
        // $classdetail = DB::table('class_users')
        //     ->select('class_users.*', 'users.name as user_name', 'class.name as class_name')
        //     ->join('users', 'class_users.user_id', '=', 'users.id')
        //     ->join('class', 'class_users.class_id', '=', 'class.id')
        //     // ->join('users', 'class_users.user_id', '=', 'users.id')
        //     ->where('class_id', '=', $id)
        //     ->simplePaginate(15); 
        // $class = Classes::find($id);
        // $course = Course::find($course_id);
        $student = User::where('role_id', 3)->get();
        return view('pages.backend.class.detail', compact('course_id', 'class_id', 'student'));
    }
    public function showDetailClass($course_id, $class_id)
    {
        switch ($class_id){
            case 'get-list':
                // $classdetail = DB::table('class_users')
                //     ->select('class_users.*', 'users.name as user_name', 'class.name as class_name')
                //     ->join('users', 'class_users.user_id', '=', 'users.id')
                //     ->join('class', 'class_users.class_id', '=', 'class.id')
                //     // ->join('users', 'class_users.user_id', '=', 'users.id')
                //     ->where('class_id', '=', $class_id);
                $classdetail = class_user::query()->where('class_id',$class_id)->with('user');
                return Datatables::of($classdetail)->make(true);
                break;
            default:
                break;
        }
    }
    
    public function postAddStudent(request $request, $course_id, $class_id){
       //dd($request->ids);
        $ids = $request->ids;
        

        $student = User::whereIn('id',$ids)->get();
        foreach ($student as $key => $value) {
            
            $class_user = class_user::create([
                'class_id' => $class_id,
                'user_id' => $value->id,
            ]);

            $point = new Point;
            $point->user_id = $value->id;
            $point->class_id = $class_id;
            $point ->save();
        }
        return redirect(route('class.detail',['course_id'=>$course_id,'id'=>$class_id]));
    }
}
