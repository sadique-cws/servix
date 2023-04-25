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
}
