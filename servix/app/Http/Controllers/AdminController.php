<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $req): View
    {
        return view('admin');
    }

    public function staffupload(Request $request)
    {
        $data = $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:App\Models\Student,email|email',
            'contact' => 'required|integer|unique:App\Models\Student,contact|digits:10',
            'salary' => 'required',
            'addhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        Staff::create($data);
        return redirect()->route('home');
    }

    public function destroy():RedirectResponse
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('home');
    }
}
