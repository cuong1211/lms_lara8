<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class BackendController extends Controller
{
    public function index()
    {
        return view('pages.backend.main');
    }
    
    
}
