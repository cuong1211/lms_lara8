<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Classes;
use Maatwebsite\Excel\Facades\Excel;

class ClassController extends Controller
{
    public function getClass($id)
    {
        $classes = Classes::all();
        $course= Course::find($id);
        return view('pages.backend.class.main', compact('classes','course'));
    }
    public function getcreateClass($course_id)
    {
        $course = Course::find($course_id);
        $teacher = User::query()->where('role_id', 2)->get();
        $student = User::query()->where('role_id', 3)->get();
        return view('pages.backend.class.create', compact('teacher', 'student','course'));
    }
    public function createClass(request $request, $course_id)
    {
        $class = Classes::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
        ]);
        return redirect(('/admin/course').'/'.$course_id.'/class');
    }
    public function Import(request $request)
    {
        Excel::import(new StudentsImport, $request->file);
        return redirect()->back();
    }

}
