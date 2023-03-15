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

    public function store(Request $request)
    {
        $data = $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:App\Models\Student,email|email',
            'contact' => 'required|integer|unique:App\Models\Student,contact|digits:10',
            'status' => 'required',
        ]);

        Customer::create($data);
        return redirect()->route('home');
    }

    
}
