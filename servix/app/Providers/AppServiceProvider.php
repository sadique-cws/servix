<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Type;
use App\Models\Request as RequestModel;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $user = Auth::guard('staff')->user();
        view()->share('dateFilter','All');
        view()->share('search_value','');
        view()->share('Types',Type::all());
        view()->share('NewCountReq',RequestModel::where('technician_id',NULL)->get()->count());
        view()->share('ConformCountReq',RequestModel::where('status',1)->get()->count());
        view()->share('RejectedCountReq',RequestModel::where('status',3)->get()->count());
        view()->share('DeliveredCountReq',RequestModel::where('status',5)->get()->count());
        view()->share('PendingCountReq',RequestModel::where('status',0)->where('technician_id',"!=",null)->get()->count());
        view()->share('allReq',RequestModel::all()->count());
        // view()->share('',RequestModel::where('status',"pending")->get()->count());
    //     view()->share('staffConformCount',RequestModel::where('type_id',$user->type_id)->where('technician_id',$user->id)->get()->count());
    //     view()->share('staffRejectedCount',RequestModel::where('type_id',$user->type_id)
    //     ->where('technician_id',$user->id)
    //     ->where('status','rejected')->get()->count());
    //     view()->share('staffPendingCount', RequestModel::where('type_id',$user->type_id)
    //     ->where('technician_id',$user->id)
    //     ->where('status','pending')->get()->count());
     }
}
