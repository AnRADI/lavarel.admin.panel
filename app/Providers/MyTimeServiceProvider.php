<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MyTime', 'App\Services\MyTime');
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
