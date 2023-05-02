<?php 

use App\Models\Request as RequestModel;
use App\Models\touch_with_us;
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
if (! function_exists('messageCounting')) {
    function messageCounting() {
       $count=touch_with_us::where('isRead',0)->count();
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
if (! function_exists('CountWorkProgress')) {
    function CountWorkProgress() {
        $count = RequestModel::where('technician_id',Auth::user()->id)->whereBetween("status",[2.0,3.0])->where('type_id',Auth()->user()->type_id)->count();
        
        
        return $count;
    }
}
if (! function_exists('StatusColor')) {
    function StatusColor($status=NULL) {
        switch($status){
            case 0:
                return "#717D7E";
                break;
            case 1:
                return "#145A32";
                break;
            case 2:
                return " #2ECC71";
                break;
            case 2.1:
                return " #E67E22";
                break;
            case 2.2:
                return " #9A7D0A";
                break;
            case 2.3:
                return " #117A65";
                break;
            case 3:
                 return "#A93226";
                 break;
            case 4:
                return "#52BE80";
                break;
            case 5:
                return "#F39C12";
                break;
            default:
                return "warning";
                break;
           }
    
    }
}

