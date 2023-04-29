<?php 

use App\Models\Request as RequestModel;
use Carbon\Carbon;

if (! function_exists('countNewRequest')) {
    function countNewRequest($type_id = NULL,$status = NULL) {
        if($status == NULL){
           
                $count = RequestModel::where('technician_id',NULL)->count();
    
        }
        else if($status == NULL){
            $count = RequestModel::where('technician_id',NULL)->where('type_id',$type_id)->count();
        }
        else if($status != NULL){
            $count = RequestModel::where('technician_id','!=',NULL)->where('type_id',$type_id)->where('status',$status)->count();
        }
        return $count;
    }
}
if (! function_exists('countTodayRequests')) {
    function countTodayRequests($type_id = NULL,$status = NULL) {
        
        if($status == NULL){
            $count=RequestModel::whereDate('created_at',Carbon::today())->count();
        }
        else if($type_id != NULL){
            $count = RequestModel::where('type_id',$type_id)->whereDate('created_at',Carbon::today())->count();
        }
        return $count;
    }
}

    // Monthly count Request

if (! function_exists('MonthlyCount')) {
    function MonthlyCount() {
        $request = RequestModel::select('id', 'created_at')->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

$requestmcount = [];
$userArr = [];

foreach ($request as $key => $value) {
    $requestmcount[(int)$key] = count($value);
}

for($i = 1; $i <= 12; $i++){
    if(!empty($requestmcount[$i])){
        $userArr[$i] = $requestmcount[$i];    
    }else{
        $userArr[$i] = 0;    
    }
}
        return array_values($userArr);
    }
}



    // Weekly count Request

if (! function_exists('WeeklyCount')) {
    function WeeklyCount() {
        $request = RequestModel::select('id', 'created_at')->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d'); // grouping by days
            });

$requestdcount = [];
$userArr = [];

foreach ($request as $key => $value) {
    $requestdcount[(int)$key] = count($value);
}

for($i = 1; $i <= 12; $i++){
    if(!empty($requestdcount[$i])){
        $userArr[$i] = $requestdcount[$i];    
    }else{
        $userArr[$i] = 0;    
    }
}
        return array_values($userArr);
    }
}

if (! function_exists('CountStaffRequest')) {
    function CountStaffRequest($status="all",$technician=NULL) {
        if($status=="all" && $technician == null ){
            $count = RequestModel::where('technician_id',Auth::user()->id)->where('type_id',Auth()->user()->type_id)->count();
        }
        elseif($status=="all" && $technician == true){
            $count = RequestModel::where('technician_id',NULL)->where('type_id',Auth()->user()->type_id)->count();
            
        }
        else{
          
            $count = RequestModel::where('technician_id',Auth::user()->id)->where("status",$status)->where('type_id',Auth()->user()->type_id)->count();
            
        }     
        
        return $count;
    }
}
if (! function_exists('StatusColor')) {
    function StatusColor($status=NULL) {
        switch($status){
            case 0:
                return "dark";
                break;
            case 1:
                return "success";
                break;
            case 2:
                return "warning";
                break;
            case 3:
                 return "danger";
                 break;
            case 4:
                return "success";
                break;
            case 5:
                return "success";
                break;
           }
    
    }
}

