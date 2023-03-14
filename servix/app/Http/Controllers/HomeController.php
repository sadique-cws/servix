<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class HomeController extends Controller
{
    public function index():View{
        return view('homepage');
    }
    public function login():View{
        return view('login');
    }
    public function register():View{
        return view('register');
    }
}
