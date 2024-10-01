<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Request as  RequestModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;

class StaffController extends Controller
{   
    public function index(Request $req): View
    {
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('technician_id',null)->where('type_id',$user->type_id)->orderBy("id", "DESC")->take(7)->get();

        return view('staff.dashboard',$data); 
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
                    return redirect()->back()->with("alert","your account is disabled");
                }
           }
           else{
                return redirect()->route("staff.login")->with("alert","Please enter valid email or password");;
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
    
    public function globalSearch(Request $req){
        $data['search_value']="";
        $data['allRequests']=RequestModel::where('service_code',"LIKE","%".$req->search."%")
        ->orWhere('contact', 'like', '%' . $req->search . '%')
        ->orWhere('owner_name', 'like', '%' . $req->search . '%')->get();
        $data['title']='Search Record';
        $data['dateFilter']='All';
        return view('staff/requests',$data);
    }
    

   
}
 