<?php

namespace Administration\Widgets\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views','menu');

        $this->publishes([
            __DIR__.'/config/' => base_path('/config')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('menu',function($app){
            return  new Menu;
        });
    }
}
