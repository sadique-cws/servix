<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $guard = "staff";
    protected $guarded=[];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
}
