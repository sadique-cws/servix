<?php

namespace App\Http\Controllers;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;


class RequestController extends Controller
{
    public function requestForm(): View
    {
        return view('requestForm');
    }

    public function requestCreate(Request $request)
    {
        $service_code = Str::random(6);
        
        $data = $request -> validate([
            'owner_name' => 'required',
            'product_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'type_id' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'problem' => 'required',
           
           ]);

           $data['service_code'] = $service_code;

        //    dd($data);

        RequestModel::create($data);
        return redirect()->route('home');
        
    }
    
    public function allRequests(){
        $userType = Auth::guard('staff')->user()->type_id;
        $data['allRequests'] = RequestModel::where('type_id',$userType)->get();
        return view("staff.requests",$data);
    }
}