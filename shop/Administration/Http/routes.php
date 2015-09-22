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
            Route::resource('structure','\Administration\Http\Controllers\StructureController');
            Route::post('structure/rebuild','\Administration\Http\Controllers\StructureController@rebuild');
        });
    });


