<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Receptioner extends Authenticatable
{
    use HasFactory;
    protected $guard = "receptioner";
    protected $guarded=[];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
}
