<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AveragesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('CalcProvider', function ($app) {
            return new CalcProvider();
        });
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
