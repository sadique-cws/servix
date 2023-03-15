<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index():View{
        return view('homepage');
    }
    public function login():View{
        return view('login');
    }
    public function adminlogin(Request $req){
        if($req->method() == "POST"){
           $data = $req->only(["email","password"]);
           
           if(Auth::guard("admin")->attempt($data)){
                return ["success"];
           }
           else{
                return ["fail"];
           }
        }
        return view('admin.adminLogin');
    }
    
    public function register():View{
        return view('register');
    }
}
