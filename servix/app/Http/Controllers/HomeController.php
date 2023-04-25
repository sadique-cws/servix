<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index():View{
        return view('homepage');
    }
    public function contactUs():View{
        return view('contact');
    }
    public function learn():View{
        return view('learn');
    }
    
    public function warranty():View{
        return view('warrantyTerms');
    }
    

    public function register():View{
        return view('register');
    }


    // public function trackStatus():View{
    //     return view('userDashboard.trackRequest');
    // }
    
}
