<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Type;

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
    }
}
