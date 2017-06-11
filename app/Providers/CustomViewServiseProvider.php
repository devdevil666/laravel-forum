<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomViewServiseProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::share('channels', \App\Channel::all());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
