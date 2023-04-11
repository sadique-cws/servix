<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Request as  RequestModel;
use Auth;
use App\Models\Staff;

class StaffController extends Controller
{   
    public function index(Request $req): View
    {
        return view('staff.dashboard');
    }

    public function stafflogin(Request $req){
        if($req->method() == "POST"){
           $data = $req->only(["email","password"]);
           
           if(Auth::guard("staff")->attempt($data)){
                $staff =  Auth::guard('staff')->user();
                if($staff->status){
                    return redirect()->route("staff.panel");
                }
                else{
                    return "your account is disabled";
                }
           }
           else{
                return redirect()->route("staff.login");
           }
        }
        return view('staff.staffLogin');
    }

    public function stafflogout(Request $req){
        Auth::guard("staff")->logout();
        return redirect()->back();
    }

  
    public function editRequest($id){
        $data=Request::where('id',$id)->first();
        return view("staff.panel",compact('data'));
    }

    // public function edit(Request $req)
    // {
    //     $data = $req->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'contact' => 'required',
    //         'salary' => 'required',
    //         'type' => 'required',
    //         'aadhar' => 'required',
    //         'pan' => 'required',
    //         'address' => 'required',
    //         'status' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $id=$req->id;
    //     Staff::where('id',$id)->update($data);
    //     return redirect()->route('admin.staff.manage');
    // }
}
 