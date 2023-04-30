<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        $user = Auth::guard('staff')->user();
        view()->share('dateFilter','All');
        view()->share('search_value','');
        view()->share('Types',Type::all());
        view()->share('NewCountReq',RequestModel::where('technician_id',NULL)->get()->count());
        view()->share('ConformCountReq',RequestModel::where('status',1)->get()->count());
        view()->share('RejectedCountReq',RequestModel::where('status',3)->get()->count());
        view()->share('WorkdoneCountReq',RequestModel::where('status',4)->get()->count());
        view()->share('DeliveredCountReq',RequestModel::where('status',5)->get()->count());
        view()->share('PendingCountReq',RequestModel::where('status',0)->get()->count());
        view()->share('allReq',RequestModel::all()->count());
       
     }
}
