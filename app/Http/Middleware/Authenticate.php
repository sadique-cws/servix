<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->expectsJson()){
            return null;
        } 
        else{
            if($request->is('admin') || $request->is('admin/*')){
                return route('admin.login');
            }
            elseif($request->is('staff') || $request->is('staff/*')){
                return route('staff.login');
            }
            elseif($request->is('crm') || $request->is('crm/*')){
                return route('receptioner.login');
            }
            else{
                return route('login');
            }
        }
    }
}
