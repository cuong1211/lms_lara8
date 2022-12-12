<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Zoom;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;

class TeacherController extends Controller
{
    public function getTeacher(){
        $zoom = Zoom::query()->get();
        return view('pages.backend.teacher.main',compact('zoom'));
    }
    public function showTeacher($id){
        switch ($id) {
            case 'get-list':
                $teacher = User::query()->where('role_id',2)->with('zoom');
                return Datatables::of($teacher)->make(true);
                break;
            default:
                break;
        }
    }
    public function store(Request $request){
        $teacher=new User();
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->password=bcrypt($request->password);
        $teacher->birthday=$request->birthday;
        $teacher->phone=$request->phone;
        $teacher->address=$request->address;
        $teacher->role_id=2;
        $teacher->zoom_id=$request->zoom_id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            Image::make($file)->resize(60,60)->save(public_path('backend/uploads/teacher/'.$name)); 
            $teacher->avatar = $name;
        }
        $teacher->save();
        if($teacher){
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
    public function update(Request $request,$id){
        $teacher=User::find($id);
        $teacher->update([
            'role_id'=>2,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'birthday' => $request->birthday,
            'zoom_id'=>$request->zoom_id
        ]);
        if($teacher){
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
    public function destroy($id){
        $teacher=User::find($id);
        $teacher->delete();
        if($teacher){
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
    public function Import(request $request)
    {   
        // $course = Course::find($course_id);
        Excel::import(new TeachersImport, $request->file);
        // $class = Classes::query()->get();
        // foreach($class as $c)
        // {
        //      DB::table('class')->update(['course_id' => $course_id]);
        // }
        return redirect()->back();
    }

}
