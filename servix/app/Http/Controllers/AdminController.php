<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function staffpanel():View{
        return view('admin.adminPanel');
    }
}
