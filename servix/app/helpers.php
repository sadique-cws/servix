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

if (! function_exists('WeeklyCount')) {
    function WeeklyCount() {
        $count = RequestModel::where('technician_id','!=',NULL)->count();
        return [2,10,5,34,54,6,32];
    }
}

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