<?php

namespace Michelangelo\EasyFilter;

use Illuminate\Support\ServiceProvider;

class EasyFilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Michelangelo\EasyFilter\EasyFilter');
    }
}
