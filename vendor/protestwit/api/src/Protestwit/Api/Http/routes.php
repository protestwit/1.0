<?php

Route::group(['prefix' => 'api'],function(){

    Route::resource('boycott','\Protestwit\Api\Http\Controllers\BoycottController');
    Route::resource('comment','\Protestwit\Api\Http\Controllers\CommentController');
    Route::get('group/search', ['as' => 'api.group.search', 'uses' => 'Protestwit\Api\Http\Controllers\GroupController@search']);
    Route::resource('group','\Protestwit\Api\Http\Controllers\GroupController');

    Route::resource('company','\Protestwit\Api\Http\Controllers\CompanyController');
    Route::resource('dispatch','\Protestwit\Api\Http\Controllers\DispatchController');
    Route::get('event/search', ['as' => 'api.event.search', 'uses' => 'Protestwit\Api\Http\Controllers\EventController@search']);
    Route::resource('event','\Protestwit\Api\Http\Controllers\EventController');
    Route::resource('image','\Protestwit\Api\Http\Controllers\ImageController');
    Route::resource('place','\Protestwit\Api\Http\Controllers\PlaceController');
//Post
    Route::post('post', ['as' => 'api.post.store', 'uses' => 'Protestwit\Api\Http\Controllers\PostController@store']);
    Route::resource('post', '\Protestwit\Api\Http\Controllers\PostController');

//Statistic
    Route::resource('statistic', '\Protestwit\Api\Http\Controllers\StatisticController');
    Route::resource('tag', '\Protestwit\Api\Http\Controllers\TagController');
    Route::resource('tweet', '\Protestwit\Api\Http\Controllers\TweetController');
    Route::resource('user', '\Protestwit\Api\Http\Controllers\UserController');
    Route::resource('vote', '\Protestwit\Api\Http\Controllers\VoteController');
});
Route::group(['prefix' => 'g'], function () {
    Route::group(['prefix' => '{group}'], function () {
        Route::group(['prefix' => 'api'], function () {
            Route::resource('dispatch', '\Protestwit\Api\Http\Controllers\DispatchController');
            Route::resource('boycott', '\Protestwit\Api\Http\Controllers\BoycottController');
        });
    });
});
