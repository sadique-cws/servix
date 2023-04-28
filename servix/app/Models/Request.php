<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Request extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function type():HasOne{
        return $this->HasOne(Type::class,"id","type_id");
    }
    public function technician():HasOne{
        return $this->HasOne(Staff::class,"id","technician_id");
    }
    
    public function getStatus(){
       $status= $this->status;
       switch($status){
        case 0:
            return "pending";
            break;
        case 1:
            return "confirm";
            break;
        case 2:
            return "work progress";
            break;
        case 3:
             return "reject";
             break;
        case 4:
            return "work done";
            break;
        case 5:
            return "delivered";
            break;
       }

    }

}
