<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role_id == 1 ){
                return redirect('/admin');
            }elseif($user->role_id == 2 ){
                return redirect('/admin');
            }elseif($user->role_id == 3 ){
                return redirect('/course');
            }else{
                Auth::logout();
                return redirect('/login');
            }
        } else {
            return view('pages.auth.login');
        }
    }
    public function postLogin(LoginRequest $request)
    {
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
        ];
        $teacher = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
        ];

        $student = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3,
        ];
        $value = Session::put('email', $request->email);
        if (Auth::attempt($admin)) {
            User::where('id', Auth::user()->id)->update(['status' => 1]);
            return redirect('/admin');
        }
        elseif (Auth::attempt($teacher)) {
            User::where('id', Auth::user()->id)->update(['status' => 1]);
            return redirect('/teacher');
        }
        elseif (Auth::attempt($student)) {
            User::where('id', Auth::user()->id)->update(['status' => 1]);
            return redirect('/course');
        } 
        else {
            return redirect('/login');
        }
    }
    public function getLogout()
    {
        User::where('id', Auth::user()->id)->update(['status' => 0]);
        Auth::logout();
        return redirect('/login');
    }
}
