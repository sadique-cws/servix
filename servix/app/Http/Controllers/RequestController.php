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

        $data = $request->validate([
            'user_id' => 'required',
            'technician_id' => 'required',
            'service_code' => 'required',
            'owner_name' => 'required',
            'product_name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'serial_no' => 'required',
            'MAC' => 'required',
            'delivered_by' => 'required',
            'estimate_delivery' => 'required',
            'date_of_delivery' => 'required',
            'date_of_creation' => 'required',
            'last_update' => 'required',
            'color' => 'required',
            'status' => 'required',
            'remark' => 'required',
            'problem' => 'required',

        ]);

        Request::create($data);
        return redirect()->route('home');

    }
    public function allRequests(){
        $userType = Auth::guard('staff')->user()->type;
        $data['requests'] = Request::where('type',$userType)->get();
        return view("staff.requests",$data);
    }
}