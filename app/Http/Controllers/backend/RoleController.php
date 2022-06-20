<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function getRole(){
        $role=Role::query()->get();
        return view('pages.backend.role.main',compact('role'));
    }
    public function create(){
        return view('pages.backend.role.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $role=new Role();
        $role->name=$request->name;
        $role->save();
        Session::flash('success','Role created successfully');
        return redirect()->route('role.main');
    }
    public function edit($id){
        $role=Role::query()->find($id);
        return view('pages.backend.role.edit',compact('role'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $role=Role::query()->find($id);
        $role->name=$request->name;
        $role->save();
        Session::flash('success','Role updated successfully');
        return redirect()->route('role.main');
    }
    public function destroy($id){
        $role=Role::query()->find($id);
        $role->delete();
        Session::flash('success','Role deleted successfully');
        return redirect()->route('role.main');
    }

}
