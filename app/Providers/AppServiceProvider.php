<?php

namespace App\Providers;
use App\Example;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // put key in container
        $this->app->bind('example', function () {
            return new Example();
        });

    }

    public function boot()
    {
        //
    }
}
