<?php

Route::group(['prefix' => 'api'],function(){
    Route::resource('dispatch','\Protestwit\Api\Http\Controllers\DispatchController');
    Route::resource('boycott','\Protestwit\Api\Http\Controllers\BoycottController');
});

Route::group(['prefix' => '{group}'],function(){
    Route::group(['prefix' => 'api'],function(){
        Route::resource('dispatch','\Protestwit\Api\Http\Controllers\DispatchController');
        Route::resource('boycott','\Protestwit\Api\Http\Controllers\BoycottController');
    });
});