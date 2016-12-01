<?php

Route::group(['middleware' => ['web'], 'prefix' => 'group'], function () {
    
//    Route::get('{group}/join', ['as' => 'group.join', 'uses' => 'Protestwit\Group\Http\Controllers\JoinController@index']);
//    Route::post('{group}/join', ['as' => 'group.join.store', 'uses' => 'Protestwit\Group\Http\Controllers\JoinController@index']);
//    Route::get('{group}/join/success', ['as' => 'group.join.success', 'uses' => 'Protestwit\Group\Http\Controllers\JoinController@success']);
//    Route::get('{group}/create', ['as' => 'group.create', 'uses' => 'Protestwit\Group\Http\Controllers\JoinController@index']);
//    Route::get('{group}/create/subgroup', ['as' => 'group.create.subgroup', 'uses' => 'Protestwit\Group\Http\Controllers\CreateController@index']);
});