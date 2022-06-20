<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function getUser(){
        $user=User::where('role_id',3)->with('role')->get();
        $role = Role::query();    
        return view('pages.backend.user.main',compact('user','role'));
    }
    public function create(){
        $role=Role::query()->get();
        return view('pages.backend.user.create',compact('role'));
    }
    public function store(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->role_id=3;
        $user->save();
        Session::flash('success','User created successfully');
        return redirect()->route('user.main');
    }
    public function edit($id){
        $user=User::query()->find($id);
        $role=Role::query()->get();
        return view('pages.backend.user.edit',compact('user','role'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user=User::query()->find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        Session::flash('success','User updated successfully');
        return redirect()->route('user.main');
    }
    public function destroy($id){
        $user=User::query()->find($id);
        $user->delete();
        Session::flash('success','User deleted successfully');
        return redirect()->route('user.main');
    }
}
