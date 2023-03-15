<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function requestForm(){
        
         return view('staff.requestForm');
    }
    public function stafLogin(Request $req){
        if($req->method() == "POST"){
            
            
                 return ["success"];
         }
        return view('staff.staffLogin');
    }
}
