<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use Auth;
use App\Models\Staff;

class StaffController extends Controller
{   
    public function index(Request $req): View
    {
        return view('staff.dashboard');
    }

    public function stafflogin(Request $req){
        if($req->method() == "POST"){
           $data = $req->only(["email","password"]);
           
           if(Auth::guard("staff")->attempt($data)){
                return redirect()->route("staff.panel");
           }
           else{
                return redirect()->route("home");
           }
        }
        return view('staff.staffLogin');
    }

    public function stafflogout(Request $req){
        Auth::guard("staff")->logout();
        return redirect()->route("home");
    }


}
 