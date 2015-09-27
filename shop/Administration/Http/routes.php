<?php

use \Illuminate\Support\Facades;


    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            '\Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter',
            '\Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect'
        ]
    ], function()
    {
        Route::group([
            'prefix'=>'cms',
            'as'=>'admin::'
        ],function(){
            Route::get('/','\Administration\Http\Controllers\DashboardController@index');
            Route::controller('structure','\Administration\Http\Controllers\StructureController');
        });


    });


