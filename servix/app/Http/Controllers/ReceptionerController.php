<?php

namespace App\Http\Controllers;

use App\Models\Receptioner;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use Illuminate\View\View;
use App\Models\Request as RequestModel;
use Illuminate\Support\Str;

class ReceptionerController extends Controller
{
    public function index(Request $req): View
    {
        $data['allRequests'] = RequestModel::orderBy("id", "DESC")->take(10)->get();
        return view('receptioner.dashboard',$data);
    }
    public function receptionerlogin(Request $req)
    {
        if ($req->method() == "POST") {
            $data = $req->only(["email", "password"]);

            if (Auth::guard("receptioner")->attempt($data)) { 
                
                return redirect()->route("receptioner.panel");
            } else {
                return redirect()->back();
            }
        }
        return view('receptioner.receptionerLogin');
    }
    public function receptionerlogout(Request $req)
    {
        Auth::guard("receptioner")->logout();
        return redirect()->back(); 
    }

    public function requestForm(Request $req){
        if($req->method()=='POST'){
            $date = \Carbon\Carbon::now();
            $service_code = Str::random(6);
            
            $data = $req -> validate([
                'owner_name' => 'required',
                'product_name' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'type_id' => 'required',
                'brand' => 'required',
                'color' => 'required',
                'problem' => 'required',
                'serial_no'=>'required',
                'MAC'=>'required',
               
               ]);
    
               $data['service_code'] = $service_code;
               $data['date_of_delivery']=$date;
               
    
            //    dd($data);
    
            RequestModel::create($data);
            return view('receptioner.reciving',$data);

        }
        return view('receptioner.requestForm');

    }

    public function allnewRequest(){
        
        $data['allRequests'] = RequestModel::where('technician_id',null)->orderBy('created_at', 'DESC')->get();
        $data['title'] = "All Request";
        return view('receptioner.requests',$data);
    }

   
    public function editRequest(Request $req, $id){
        if($req->method()=='POST'){
            $data = $req->validate([
                'serial_no' => 'required',
                'MAC' => 'required',
                'remark' => 'required',
                'estimate_delivery' => 'required',
               
            ]);
            $id=$req->id;
            RequestModel::where('id',$id)->update($data);
            return redirect()->back();

        }
        $data=RequestModel::where('id',$id)->first();
        return view("receptioner.requestEdit",compact('data'));
    }
   //dateFilter
    public function dateFilter(Request $req){
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $req->End);
        $date->addDays();
        $formattedDate = $date->format('Y-m-d');
        $data['allRequests']= RequestModel::select("*")->whereBetween('created_at', [$req->startAt, $formattedDate])->where('technician_id',NULL)
                                    ->get();
        $data['title']="Date between Request";
        return view('receptioner/requests', $data);
    }
    public function filterBySelect(Request $req){
        
        
        $data['dateFilter']=$req->dateFilter;
        

        switch ($req->dateFilter) {
            case 'today':
                $data['allRequests']=RequestModel::whereDate('created_at',Carbon::today())->where('technician_id',null)-> get();
                $data['title']="Today Request";
                
                break;
            case 'yesterday':
                $data['allRequests']=RequestModel::whereDate('created_at',Carbon::yesterday())->where('technician_id',null)-> get();
                $data['title']="yesterday Request";
                break;
            case 'this_week':
                $data['allRequests']=RequestModel::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->where('technician_id',null)-> get();
                $data['title']="This Week Request";
                break;
            case 'this_month':
                $data['allRequests']=RequestModel::whereMonth('created_at',Carbon::now()->month)->where('technician_id',null)-> get();
                $data['title']="This Month Request";
                break;
            case 'last_month':
                $data['allRequests']=RequestModel::whereMonth('created_at',Carbon::now()->subMonth()->month)->where('technician_id',null)-> get();
                $data['title']="Last Month Request";
                break;
            case 'this_year':
                $data['allRequests']=RequestModel::whereYear('created_at',Carbon::now()->year)->where('technician_id',null)-> get();
                $data['title']="This Year Request";
                break;
            case 'last_year':
                $data['allRequests']=RequestModel::whereYear('created_at',Carbon::now()->subYear()->year)->where('technician_id',null)-> get();
                $data['title']="Last Year Request";
                break;
            
            default:
                $data['allRequests'] = RequestModel::where('technician_id',null)->get();
                $data['title']="All New Request";
            
                break;
        
            }
        return view('receptioner/requests',$data);
       
    }
    public function filterByInput(Request $req){
       
        $data['search_value']=$req->search;
        $data['allRequests']=RequestModel::where("technician_id",null)->where('owner_name',"LIKE","%".$req->search."%")->get();
        $data['title']='Search Record';
        $data['dateFilter']='All';
        return view('receptioner/requests',$data);
    }

    public function showAllreceptioner(){
        $data['receptioner'] = Receptioner::all();
        return view('admin/receptioner/manageReceptioner', $data);  
    }

    public function status(Request $req, Receptioner $receptioner)
    {
        $receptioner->status = !$receptioner->status;
        $receptioner->save();

        return redirect()->back();

    }
   
    public function addReceptioner(Request $req){
        if($req->method()=='POST'){
            $data = $req->validate([
                'name' => 'required',
                'email' => 'required|unique:App\Models\Receptioner,email|email',
                'contact' => 'required|integer|unique:App\Models\Receptioner,contact|digits:10',
                'salary' => 'required',
                'aadhar' => 'required',
                'pan' => 'required',
                'address' => 'required',
                'status' => 'required',
                'password' => 'required',
            ]);
            Receptioner::create($data);
            return redirect()->back();       

        }
        return view('admin.receptioner.addReceptioner');
        
    }
  
    public function confirmedRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status','work in progress')->orderBy('created_at', 'DESC')->get();
        $data['title'] = "Confirm Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function rejectedRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status','rejected')->orderBy('created_at', 'DESC')->get();
        $data['title'] = "rejected Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function pandingRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status','panding')->orderBy('created_at', 'DESC')->get();
        $data['title'] = "panding Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function deliveredRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status','Delivered')->orderBy('created_at', 'DESC')->get();
        $data['title'] = "Delivered Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function allRequest(Request $req){
      
        $data['allRequests'] = RequestModel::orderBy('created_at', 'DESC')->get();
        $data['title'] = "all Requests";                                    
        return view("receptioner.requests",$data);   
    }
   

}
