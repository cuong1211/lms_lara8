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


class ClassController extends Controller
{
    public function getClass($id)
    {

        $classes = Classes::query()->where('course_id', $id)->with('user')->get();
        $course = Course::find($id);
        return view('pages.backend.class.main', compact('classes', 'course'));
    }
    public function getcreateClass($course_id)
    {
        $course = Course::find($course_id);
        $teacher = User::query()->where('role_id', 2)->get();
        $student = User::query()->where('role_id', 3)->get();
        return view('pages.backend.class.create', compact('teacher', 'student', 'course'));
    }
    public function createClass(request $request, $course_id)
    {
        $class = Classes::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
        ]);
        return redirect(('/admin/course') . '/' . $course_id . '/class');
    }
    public function getDetailClass($course_id, $id)
    {
        $classdetail = DB::table('class_users')
            ->select('class_users.*', 'users.name as user_name', 'class.name as class_name')
            ->join('users', 'class_users.user_id', '=', 'users.id')
            ->join('class', 'class_users.class_id', '=', 'class.id')
            // ->join('users', 'class_users.user_id', '=', 'users.id')
            ->where('class_id', '=', $id)
            ->simplePaginate(15); 
        $class = Classes::find($id);
        $course = Course::find($course_id);
        return view('pages.backend.class.detail', compact('classdetail', 'course','class'));
    }
    public function getAddStudent($course_id, $class_id){
        $student = User::query()->where('role_id', 3)->get();
        $class = Classes::find($class_id);
        $course = Course::find($course_id);
        return view('pages.backend.class.addstudent', compact('student', 'class','course'));

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
