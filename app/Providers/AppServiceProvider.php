<?php

namespace App\Providers;

use App\Services\Interfaces\RestaurantService;
use App\Services\Interfaces\RiderService;
use App\Services\RestaurantServiceImpl;
use App\Services\RiderServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RiderService::class, RiderServiceImpl::class);
        $this->app->bind(RestaurantService::class, RestaurantServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
