<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Type;
use App\Models\Request as RequestModel;

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
        view()->share('dateFilter','All');
        view()->share('search_value','');
        view()->share('Types',Type::all());
        view()->share('NewCountReq',RequestModel::where('technician_id',NULL)->get()->count());
        view()->share('ConformCountReq',RequestModel::where('status',"work in progress")->get()->count());
        view()->share('RejectedCountReq',RequestModel::where('status',"rejected")->get()->count());
        view()->share('DeliveredCountReq',RequestModel::where('status',"Delivered")->get()->count());
        view()->share('PendingCountReq',RequestModel::where('status',"pending")->get()->count());
        view()->share('allReq',RequestModel::all()->count());
    }
}
