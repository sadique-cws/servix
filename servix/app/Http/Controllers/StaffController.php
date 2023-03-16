<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class StaffController extends Controller
{
    public function requestForm():View{
        
        return view('staff.requestForm');
    }
    public function staffLogin(Request $req):View{
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
