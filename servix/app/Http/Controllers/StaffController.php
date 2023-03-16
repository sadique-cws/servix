<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class StaffController extends Controller
{
    public function requestForm():View{
        
         return view('staff.requestForm');
    }
    public function stafLogin(Request $req):View{
        if($req->method() == "POST"){
            
                 return ["success"];
         }
        return view('staff.staffLogin');
    }
    
    public function staffpanel():View{
        return view('staff.staffPanel');
    
    }

}
