<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hash;

class Receptioner extends Model
{
    use HasFactory;
    protected $guard = "receptioner";
    protected $guarded=[];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
}
