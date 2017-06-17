<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view) {
            $channels = \Cache::rememberForever('channels', function () {
                return \App\Channel::all();
            });
            $view->with('channels', $channels);
        });
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
