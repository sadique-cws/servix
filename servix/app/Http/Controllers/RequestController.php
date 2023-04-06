<?php

namespace App\Http\Controllers;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class RequestController extends Controller
{
    public function requestForm(): View
    {
        return view('requestForm');
    }

    public function requestCreate(Request $request)
    {
       
        $data = $request -> validate([
            'owner_name' => 'required',
            'product_name' => 'required',
            'email' => 'required|unique:App\Models\Staff,email|email',
            'contact' => 'required|integer|unique:App\Models\Staff,contact|digits:10',
            'salary' => 'required',
            'type' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);php 

        Request::create($data);
        return redirect()->route('home');
        
    }
    
    public function allRequests(){
        $userType = Auth::guard('staff')->user()->type;
        $data['requests'] = Request::where('type',$userType)->get();
        return view("staff.requests",$data);
    }
}