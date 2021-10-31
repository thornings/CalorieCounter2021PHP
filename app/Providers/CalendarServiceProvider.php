<?php

namespace App\Providers;

use App\Services\CalendarService;
use App\Services\Interfaces\CalendarServiceInterface;
use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(CalendarServiceInterface::class, CalendarService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
