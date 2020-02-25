<?php

namespace App\Providers;

use App\Observers\CarWashBookingObserver;
use App\CarWashBooking;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        CarWashBooking::observe(CarWashBookingObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
