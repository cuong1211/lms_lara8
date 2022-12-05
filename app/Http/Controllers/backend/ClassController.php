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
use Intervention\Image\Point as ImagePoint;
use Yajra\Datatables\Datatables;


class ClassController extends Controller
{
    public function getClass($course_id)
    {
        $teacher = User::where('role_id', 2)->get();
        return view('pages.backend.class.main', compact('course_id', 'teacher'));
    }
    public function showClass($course_id, $id)
    {
        switch ($id) {
            case 'get-list':
                $class = Classes::query()->where('course_id', $course_id)->with('user');
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
    public function deleteClass($course_id, $class_id)
    {
        $class = Classes::find($class_id);
        $class->delete();
        if ($class) {
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
    public function getDetailClass($course_id, $class_id)
    {
        // $student = User::where('role_id', 3)->get();
        $a = class_user::where('class_id', $class_id)->get();
        // foreach ($a as $key => $value) {
        //     $b[] = $value->user_id;
        // }
        // $student = User::where('role_id', 3)->whereNotIn('id',$b)->get();
        return view('pages.backend.class.detail', compact('course_id', 'class_id'));
    }
    public function showDetailClass($course_id, $class_id, $id)
    {
        switch ($id) {
            case 'get-list':
                $classdetail = class_user::where('class_id', $class_id)->with('user');
                return Datatables::of($classdetail)->make(true);
                break;
            default:
                break;
        }
    }
    public function showaddStudent($course_id, $class_id, $id)
    {
        switch ($id) {
            case 'get-student':
                $b = array();
                $a = class_user::where('class_id', $class_id)->get();
                foreach ($a as $key => $value) {
                    $b[] = $value->user_id;
                }
                // dd($b);
                $student = User::where('role_id', 3)->whereNotIn('id',$b);
                return Datatables::of($student)->make(true);
                break;
            default:
                break;
        }
    }
    public function postAddStudent(request $request, $course_id, $class_id)
    {
        //dd($request->ids);
        if (isset($request->ids)){
            $ids = $request->ids;
            // dd($ids);
            $student = User::whereIn('id', $ids)->get();
            // dd($student);
            foreach ($student as $key => $value) {
                $class_user = class_user::create([
                    'class_id' => $class_id,
                    'user_id' => $value->id,
                    $b[] = $value->id,
                ]);
                $point = new Point;
                $point->user_id = $value->id;
                $point->class_id = $class_id;
                $point->save();
            }

            // dd($student);
            if ($class_user) {
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
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Bạn phải chọn ít nhất 1 sinh viên'
                ]
            );
        }
    }
    public function postdeleteStudent(request $request, $course_id, $class_id)
    {
        $student_id_array = $request->ids;
        // dd($student_id_array);
        $student = class_user::whereIn('user_id', $student_id_array)->delete();
        point::whereIn('user_id', $student_id_array)->delete();
        if ($student) {
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
