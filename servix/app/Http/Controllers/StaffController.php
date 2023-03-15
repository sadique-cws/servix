<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function requestForm(){
        
         return view('staff.requestForm');
    }
}
