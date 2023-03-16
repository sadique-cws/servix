<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class StaffController extends Controller
{
    public function requestForm():View{
        
        return view('staff.requestForm');
    } 
    public function index(){
        return view("staff.staffPanel");
    }
    public function staffLogin(Request $req){
        if($req->method() == "POST"){
            return ["success"];
         }
        return view('staff.staffLogin');
    }

    // debatable
    public function store(Request $request)
    {
        $data = $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:App\Models\Student,email|email',
            'contact' => 'required|integer|unique:App\Models\Student,contact|digits:10',
            'status' => 'required',
        ]);

        User::create($data);
        return redirect()->route('home');
    }

    
}
 