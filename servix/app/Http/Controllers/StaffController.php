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
        $user = Auth::guard('staff')->user();
        $count_Requests = RequestModel::where('type_id',$user->type_id)->where('technician_id',$user->id)->count();
        return view('staff.dashboard',compact('count_Requests'));
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
        return redirect()->route("home");
    }

  

}
 