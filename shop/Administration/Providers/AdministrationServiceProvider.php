<?php

namespace Administration\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Routing\Router;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //$router->pattern('lang', '[a-z]{2}');
        require __DIR__.'/../Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../views','administration');

        $this->publishes([
            __DIR__.'/../assets/' => public_path('/assets/cms')
           // __DIR__.'/migrations/2015_09_13_000000_create_todos_table.php' => base_path('database/migrations/2015_09_13_000000_create_todos_table.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('administration',function($app){
            return  new Administration;
        });
    }
}
