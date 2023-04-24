<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\View\View;

class ReceptionerController extends Controller
{
    public function index(Request $req): View
    {
        return view('receptioner.dashboard');
    }
    public function receptionerlogin(Request $req)
    {
        if ($req->method() == "POST") {
            $data = $req->only(["email", "password"]);

            if (Auth::guard("admin")->attempt($data)) { 
                
                return redirect()->route("receptioner.dashboard");
            } else {
                return redirect()->back();
            }
        }
        return view('receptioner.receptionerLogin');
    }
   
}
