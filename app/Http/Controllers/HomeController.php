<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

Use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype)
        {
            return view('admin.dashboard');
        }

        else
        {
            return view('home');
        }
    }
}
