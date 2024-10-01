<?php

namespace App\Http\Controllers;
use App\Models\Request as RequestModel;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Mail\RequestSend;
use PDF;


use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function requestForm(): View
    {
        $data['Types'] = Type::all();        
        return view('requestForm',$data);
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
        // return redirect()->route('flashMsg');
        // Mail::to($data['email'])->send(new RequestSend());

        return view('flashMessage',$data);
        
    }
    
    public function allRequests(){
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)->where('technician_id',$user->id)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "All Request";
        return view("staff.requests",$data);
    }

    public function newRequests(){
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)->where('technician_id',NULL)
                                        ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "New Request";
        return view("staff.requests",$data);
    }

    // Confirm request 
    public function confirmRequest(Request $req, $id){
        $date = \Carbon\Carbon::now();
        $date->addDays(7);
        $user = Auth::guard('staff')->user();
        $request = RequestModel::where('type_id',$user->type_id)
                                ->where('technician_id',NULL)
                                ->where('id',$id)->first();

        $request->technician_id = $user->id;
        $request->status =1;    // 1 confirm
        $request->estimate_delivery=$date;
        $request->save();
        return redirect()->route("request.all");
    }
    // work in progress requset 
    public function workProgressRequest(Request $req, $id){
        $user = Auth::guard('staff')->user();
        $request = RequestModel::where('type_id',$user->type_id)
                                ->where('technician_id',$user->id)
                                ->where('status',1)  // 1 confirm
                                ->where('id',$id)->first();
        $request->status =2;   //2 for work process 
        $request->save();
        return redirect()->back();
    }
    // update Deassemble requset 
    public function deassemble(Request $req, $id){
        $user = Auth::guard('staff')->user();
        $request = RequestModel::where('type_id',$user->type_id)
                                ->where('technician_id',$user->id)
                                ->where('status',2)  // 1 confirm
                                ->where('id',$id)->first();
        $request->status =2.1;   // Deassemble
        $request->save();
        return redirect()->back();
    }
    // update Repair requset 
    public function repair(Request $req, $id){
        $user = Auth::guard('staff')->user();
        $request = RequestModel::where('type_id',$user->type_id)
                                ->where('technician_id',$user->id)
                                // ->where('status',2.1)  
                                ->where('id',$id)->first();
        $request->status =2.2;   // Repair 
        $request->save();
        return redirect()->back();
    }
    // update Assemble requset 
    public function assemble(Request $req, $id){
        $user = Auth::guard('staff')->user();
        $request = RequestModel::where('type_id',$user->type_id)
                                ->where('technician_id',$user->id)
                                // ->where('status',1)  
                                ->where('id',$id)->first();
        $request->status =2.3;   //Assemble 
        $request->save();
        return redirect()->back();
    }

    // reject update table
    public function rejected( Request $req){
        
        $user = Auth::guard('staff')->user();
        $data=RequestModel::where('id',$req->id)
        ->where('type_id',$user->type_id)
        ->where('status',"!=",5)  // 5 delivered
        ->where('technician_id',$user->id)->first();
        $data->status= 3;   // 3 reject
        $data->remark=$req->remark;
        $data->save();   
        return redirect()->back();
    }

    //pending update table
   
    public function pending( Request $req){
        $user = Auth::guard('staff')->user();
        $data=RequestModel::where('id',$req->id)
        ->where('type_id',$user->type_id)
        ->where('status',"!=",5)    // 5 delivered
        ->where('technician_id',$user->id)->first();
        $data->status= 0; // 0 painding
        $data->technician_id=null;
        
        $data->save();   
        return redirect()->back();
    }
    //  work done requset
   
    public function workDone( Request $req){
        $user = Auth::guard('staff')->user();
        $data=RequestModel::where('id',$req->id)
        ->where('type_id',$user->type_id)
        ->where('technician_id',$user->id)
        // ->where('status',2)  
        ->first();
        $data->status= 4;   // 4 work done
        $data->save();   
        return redirect()->back();
    }

     // update device deliver 
     public function requestDeliver( Request $req){
        $date = \Carbon\Carbon::now();
        $user = Auth::guard('receptioner')->user();
        $data=RequestModel::where('id',$req->id)->where('status',4)->first(); // 4 workdone
        $data->status= 5;   // 5 deliver
        $data->remark= "please feedback";
        $data->delivered_by=$user->name;
        $data->date_of_delivery=$date;
        $data->save();   
        return redirect()->back();
    }

    // show delivered 
    public function showDelivered(){
      
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)
                                    ->where('technician_id',$user->id)
                                    ->where('status',5)->paginate(8);
        $data['title'] = "Total Delivered Requests";
        $data["deliveredCount"] = $data['allRequests']->count();
        
        return view("staff.requests",$data);
    }

    // show pending request
    public function pendingRequests(){
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)
                                    ->where('technician_id',$user->id)                              
                                    ->where('status',0)
                                    ->orderBy('created_at', 'DESC')->paginate(8);

        $data['title'] = "Total Pending Requests";
        return view("staff.requests",$data);
       
    }
    //  showWorkprogress request
    public function showWorkprogress(){
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)
                                    ->where('technician_id',$user->id)                              
                                   -> whereBetween('status', [2.0, 3.0])
                                    
                                    ->orderBy('created_at', 'DESC')->paginate(8);

        $data['title'] = "Current work Requests";
        return view("staff.requests",$data);
       
    }
    // show  rejected request 
    public function rejectedRequests(){
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)
                                    ->where('technician_id',$user->id)
                                    ->where('status',3)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Total RejectedRequests";
        $data["RejectedCount"] = $data['allRequests']->count();
        return view("staff.requests",$data);
       
    }
    // show Work Done Request
    public function workDoneRequests(){
        $user = Auth::guard('staff')->user();
        $data['allRequests'] = RequestModel::where('type_id',$user->type_id)
                                    ->where('technician_id',$user->id)
                                    ->where('status',4)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Total WorkDoneRequests";
        return view("staff.requests",$data);
       
    }


    public function requestEdit(Request $req, $id){
        $data=RequestModel::where('id',$id)->first();
        return view("staff.requestEdit",compact('data'));
    }

    public function requestUpdate(Request $req)
    {
        $data = $req->validate([ 
            'remark' => 'required',
            'serial_no' => 'required',
            'MAC' => 'required',
            'status' => 'required',
        ]);

        $id=$req->id;
        RequestModel::where('id',$id)->update($data);
        return redirect()->route('request.all');
    }

    


    public function trackStatus(Request $req)
    {  
        $data['searchStatus']="";
        $data['item']="";
        if($req->method()=='POST'){
            $req->validate([
                'search' => "required|min:6|max:6",
            ],[
                'search.required' => "Please Enter 6 Character Service Code",
                'search.min' => "Service Code must be at least 6 characters.",
                'search.max' => "Service Code must be at least 6 characters."
            ]);
           $data['searchStatus'] = $req->search;
        
           $searchStatus=$req->search;
        
          $item = RequestModel::where('service_code', 'LIKE', "%$searchStatus%")->first();

          if(!$item){
            return redirect()->back()->with('msg',"Service Code is Not Found"); 
          }
          return view('userDashboard.trackRequest',compact('item','searchStatus'));
       }

      
    return view('userDashboard.trackRequest',$data);
        
    }

    public function dateFilter(Request $req){
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $req->End);
        $date->addDays();
        $formattedDate = $date->format('Y-m-d');
        $data['allRequests']= RequestModel::select("*")->whereBetween('created_at', [$req->startAt, $formattedDate])->where('technician_id',NULL)
                                    ->paginate(8);
        $data['title']="Date between Request";
        return view('staff/requests', $data);
    }
    public function filterBySelect(Request $req){
        // $date = \Carbon\Carbon::now();
        // $date->subDays(7);
        // $formattedDate = $date->format('Y-m-d');
        // dd($formattedDate);
        // last month code 
        // User::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get(['name','created_at']);
        $user = Auth::guard('staff')->user();
        $data['dateFilter']=$req->dateFilter;
        

        switch ($req->dateFilter) {
            case 'today':
                $data['allRequests']=RequestModel::whereDate('created_at',Carbon::today())->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="Today Request";
                
                break;
            case 'yesterday':
                $data['allRequests']=RequestModel::whereDate('created_at',Carbon::yesterday())->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="yesterday Request";
                break;
            case 'this_week':
                $data['allRequests']=RequestModel::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="This Week Request";
                break;
            case 'this_month':
                $data['allRequests']=RequestModel::whereMonth('created_at',Carbon::now()->month)->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="This Month Request";
                break;
            case 'last_month':
                $data['allRequests']=RequestModel::whereMonth('created_at',Carbon::now()->subMonth()->month)->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="Last Month Request";
                break;
            case 'this_year':
                $data['allRequests']=RequestModel::whereYear('created_at',Carbon::now()->year)->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="This Year Request";
                break;
            case 'last_year':
                $data['allRequests']=RequestModel::whereYear('created_at',Carbon::now()->subYear()->year)->where('technician_id',$user->id)->where('type_id',$user->type_id)->paginate(8);
                $data['title']="Last Year Request";
                break;
            
            default:
                $data['allRequests'] = RequestModel::where('technician_id',$user->id)->paginate(8);
                $data['title']="All New Request";
            
                break;
        
            }
        return view('staff/requests',$data);
       
    }
    public function filterByInput(Request $req){
        $user = Auth::guard('staff')->user();
       
        // dd($req->search);
        $data['search_value']=$req->search;
        $data['allRequests']=RequestModel::where("technician_id",$user->id)->where('owner_name',"LIKE","%".$req->search."%")->paginate(8);
        $data['title']='Search Record';
        $data['dateFilter']='All';
        return view('staff/requests',$data);
    }

    
    public function globalSearch(Request $req){
        $data['search_value']="";
        $data['allRequests']=RequestModel::where('service_code',"LIKE","%".$req->search."%")
        ->orWhere('contact', 'like', '%' . $req->search . '%')
        ->orWhere('owner_name', 'like', '%' . $req->search . '%')->paginate(8);
        $data['title']='Search Record';
        $data['dateFilter']='All';
        return view('receptioner/requests',$data);
    }
   
}