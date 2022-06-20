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
            return redirect('/admin');
        } else {
            return view('pages.auth.login');
        }
    }
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'status' => 0
        ];
        $value = Session::put('email', $request->email);
        if (Auth::attempt($login)) {
            User::where('id', Auth::user()->id)->update(['status' => 1]);
            return redirect('/admin');
        } else {
            return redirect('/admin/login');
        }
    }
    public function getLogout()
    {
        User::where('id', Auth::user()->id)->update(['status' => 0]);
        Auth::logout();
        return redirect('/admin/login');
    }
}
