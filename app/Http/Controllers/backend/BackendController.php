<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
class BackendController extends Controller
{
    public function index()
    {
        return view('pages.backend.main');
    }
    public function getCourse()
    {
        $courses = Course::query()->get();
        return view('pages.backend.pre_course',compact('courses'));
    }
    
    
}
