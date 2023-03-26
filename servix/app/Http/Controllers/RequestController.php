<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function requestForm():View{
        return view('requestForm');
    }
}
