<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function getUser(){  
        return view('pages.backend.user.main');
    }
    public function showUser($id){
        switch ($id) {
            case 'get-list':
                $user = User::query()->where('role_id',3);
                return Datatables::of($user)->make(true);
                break;
            default:
                break;
        }
    }
    public function store(Request $request){
        $user = User::create([
            'role_id'=>3,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'birthday' => $request->birthday
        ]);
        if($user){
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
        $user = User::find($id);
        $user->update([
            'role_id'=>3,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'birthday' => $request->birthday
        ]);
        if($user){
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
        $user=User::find($id);
        $user->delete();
        if($user){
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
        Excel::import(new StudentsImport, $request->file);
        // $class = Classes::query()->get();
        // foreach($class as $c)
        // {
        //      DB::table('class')->update(['course_id' => $course_id]);
        // }
        return redirect()->back();
    }
}
