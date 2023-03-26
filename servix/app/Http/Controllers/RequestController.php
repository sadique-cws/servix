<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

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
}