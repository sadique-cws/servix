<?php 

use App\Models\Request as RequestModel;

if (! function_exists('countNewRequest')) {
    function countNewRequest($type_id,$status = NULL) {
        if($status == NULL){
            $count = RequestModel::where('technician_id',NULL)->where('type_id',$type_id)->count();
        }
        else if($status != NULL){
            $count = RequestModel::where('technician_id','!=',NULL)->where('type_id',$type_id)->where('status',$status)->count();
        }
        return $count;
    }
}
