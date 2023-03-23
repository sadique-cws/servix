<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $req): View
    {
        $data=Staff::all();
        $count=$data->count();
        return view('admin.dashboard',['staffs'=>$data]);
    }

    public function adminlogin(Request $req){
        if($req->method() == "POST"){
           $data = $req->only(["email","password"]);
           
           if(Auth::guard("admin")->attempt($data)){
                return redirect()->route("admin.panel");
           }
           else{
                return redirect()->back();
           }
        }
        return view('admin.adminLogin');
    }

    public function adminlogout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->back();
    }

    public function staffUpload(Request $request)
    {
        $data = $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:App\Models\Staff,email|email',
            'contact' => 'required|integer|unique:App\Models\Staff,contact|digits:10',
            'salary' => 'required',
            'type' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        Staff::create($data);
        return redirect()->route('admin.staff.manage');
    }

    public function destroy(Request $req, $id):RedirectResponse
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('admin.staff.manage');
    }


    public function manageStaff(Request $req){
        $data['staffs'] = Staff::all();
        return view('admin/manageStaff',$data);
    }

    public function insertStaff(Request $req){
        return view("admin.insertStaff");
    }

    public function editStaff($id){
        $data=Staff::where('id',$id)->first();
        return view("admin.editStaff",compact('data'));
    }


    public function update(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        $id=$req->id;
        Staff::where('id',$id)->update($data);
        return redirect()->route('admin.staff.manage');
    }
}
    