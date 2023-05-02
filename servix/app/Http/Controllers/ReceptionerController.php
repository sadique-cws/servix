<?php

namespace App\Http\Controllers;

use App\Models\Receptioner;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use Illuminate\View\View;
use App\Models\Request as RequestModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ReceptionerController extends Controller
{
    public function index(Request $req): View
    {
        $data['allRequests'] = RequestModel::orderBy("id", "DESC")->where('technician_id',null)->take(10)->get();
        return view('receptioner.dashboard',$data);
    }
    public function receptionerlogin(Request $req)
    {
        if ($req->method() == "POST") {
            $data = $req->only(["email", "password"]);

            if (Auth::guard("receptioner")->attempt($data)) { 
                
                return redirect()->route("receptioner.panel");
            } else {
                return redirect()->back()->with("alert","Please enter valid email or password");;
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
               
           if($req->image!=null){
            $img = $req->image;
            $folderPath = "uploads/";
            
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            
            $file = $folderPath . $fileName;
            Storage::put($file, $image_base64);
            // dd($fileName);
           $data['image'] = $fileName;
           }
    
            RequestModel::create($data);

            return redirect()->route("receptioner.all.request");

        }
        return view('receptioner.requestForm');

    }

    public function allnewRequest(){
        
        $data['allRequests'] = RequestModel::where('technician_id',null)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "All Request";
        return view('receptioner.requests',$data);
    }
    public function viewRequest(Request $req, $id){
        
        $item = RequestModel::FindOrFail($id);
        $title = "View " . ucfirst($item->owner_name) . "'s Request";
        return view('receptioner.viewRequests',compact("item","title"));
    }

   
    public function editRequest(Request $req, $id){
        if($req->method()=='POST'){
            $data = $req->validate([
                'serial_no' => 'required',
                'MAC' => 'required',
                'remark' => 'required',
                'estimate_delivery' => 'required',
                
               
            ]);
            
           if($req->image!=null){
            $data['image']=$req->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $img = $req->image;
            $folderPath = "public/uploads/";
            
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            
            $file = $folderPath . $fileName;
            Storage::put($file, $image_base64);
            // dd($fileName);
            $data['image'] = $fileName;
           }
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
        $data['allRequests']= RequestModel::select("*")->whereBetween('created_at', [$req->startAt, $formattedDate])
                                    ->paginate(8);
        $data['title']="Date between Request";
        return view('receptioner/requests', $data);
    }
    public function filterBySelect(Request $req){
        
        
        $data['dateFilter']=$req->dateFilter;
        

        switch ($req->dateFilter) {
            case 'today':
                $data['allRequests']=RequestModel::whereDate('created_at',Carbon::today())-> paginate(8);
                $data['title']="Today Request";
                
                break;
            case 'yesterday':
                $data['allRequests']=RequestModel::whereDate('created_at',Carbon::yesterday())-> paginate(8);
                $data['title']="yesterday Request";
                break;
            case 'this_week':
                $data['allRequests']=RequestModel::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])-> paginate(8);
                $data['title']="This Week Request";
                break;
            case 'this_month':
                $data['allRequests']=RequestModel::whereMonth('created_at',Carbon::now()->month)-> paginate(8);
                $data['title']="This Month Request";
                break;
            case 'last_month':
                $data['allRequests']=RequestModel::whereMonth('created_at',Carbon::now()->subMonth()->month)-> paginate(8);
                $data['title']="Last Month Request";
                break;
            case 'this_year':
                $data['allRequests']=RequestModel::whereYear('created_at',Carbon::now()->year)-> paginate(8);
                $data['title']="This Year Request";
                break;
            case 'last_year':
                $data['allRequests']=RequestModel::whereYear('created_at',Carbon::now()->subYear()->year)-> paginate(8);
                $data['title']="Last Year Request";
                break;
            
            default:
                $data['allRequests'] = RequestModel::all();
                $data['title']="All New Request";
            
                break;
        
            }
        return view('receptioner/requests',$data);
       
    }
    public function filterByInput(Request $req){
       
        $data['search_value']=$req->search;
        $data['allRequests']=RequestModel::where('owner_name',"LIKE","%".$req->search."%")->paginate(8);
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
                'password' => 'required',
            ]);
            $data['status']=1;
            
            Receptioner::create($data);
            return redirect()->route("receptioner.showAllreceptioner");       

        }
        return view('admin.receptioner.addReceptioner');
        
    }
  
    public function confirmedRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status',1)
                                            ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Confirm Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function rejectedRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status',3)
                                ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "rejected Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function pendingRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status',0)
                                ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "pending Requests";                                    
        return view("receptioner.requests",$data);   
    }
    public function deliveredRequest(Request $req){
      
        $data['allRequests'] = RequestModel::where('status',5)
                                ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Delivered Requests";                                    
        return view("receptioner.requests",$data);   
    }

     // show Work Done Request
     public function workDoneRequests(){
        
        $data['allRequests'] = RequestModel::where('status',4)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Total WorkDoneRequests";
        return view("receptioner.requests",$data);
       
    }
    public function allRequest(Request $req){
      
        $data['allRequests'] = RequestModel::orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "all Requests";                                    
        return view("receptioner.requests",$data);   
    }

    public function EditReceptioner($id)
    {
        $data = Receptioner::where('id', $id)->first();
        return view("admin.receptioner.editReceptioner", compact('data'));
    }

    public function UpdateReceptioner(Request $req)
    {
       
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'salary' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            
        ]);
        $data['status'] = ($req->status) ? 1 : 0 ;
        $id = $req->id;
        Receptioner::where('id', $id)->update($data);
        return redirect()->route('receptioner.showAllreceptioner');
    }

    
   

}
