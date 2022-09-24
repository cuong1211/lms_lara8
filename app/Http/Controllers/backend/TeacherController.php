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

class TeacherController extends Controller
{
    public function getTeacher(){
        $teacher=User::where('role_id',2)->with('zoom')->get();
        return view('pages.backend.teacher.main',compact('teacher'));
    }
    public function create(){
        $zoom = Zoom::query()->get();
        return view('pages.backend.teacher.create',compact('zoom'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $teacher=new User();
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->password=bcrypt($request->password);
        $teacher->role_id=2;
        $teacher->zoom_id=$request->zoom_id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            Image::make($file)->resize(60,60)->save(public_path('backend/uploads/teacher/'.$name)); 
            $teacher->avatar = $name;
        }
        $teacher->save();
        Session::flash('success','Teacher created successfully');
        return redirect()->route('teacher.main');
    }
    public function edit($id){
        $teacher=User::query()->find($id);
        $zoom = Zoom::query()->get();
        return view('pages.backend.teacher.edit',compact('teacher','zoom'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $teacher=User::query()->find($id);
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->zoom_id=$request->zoom_id;
        $teacher->save();
        Session::flash('success','Teacher updated successfully');
        return redirect()->route('teacher.main');
    }
    public function destroy($id){
        $teacher=User::query()->find($id);
        $teacher->delete();
        Session::flash('success','Teacher deleted successfully');
        return redirect()->route('teacher.main');
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
