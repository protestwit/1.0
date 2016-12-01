<?php


Route::get('test', ['as' => 'home', 'uses' => 'Protestwit\Frontend\Http\Controllers\TestController@index']);

Route::get('groups', ['as' => 'groups.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupsController@index']);


Route::group(['middleware' => ['web'],'prefix' => 'group'], function () {
    Route::get('/{group}', ['as' => 'group.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@show']);
});


Route::group(['middleware' => ['web']], function () {
    Route::get('', ['as' => 'home', 'uses' => 'Protestwit\Frontend\Http\Controllers\HomeController@index']);
});

Route::group(['middleware' => ['web'],'prefix' => 'tags'], function () {
    Route::get('', ['as' => 'tags.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\TagController@index']);
});

Route::group(['middleware' => ['web'],'prefix' => 'tag'], function () {
    Route::get('/{tag}', ['as' => 'tag.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\TagController@show']);
});








Route::get('{group}/dispatches', ['as' => 'dispatches.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@index']);


Route::group(['middleware' => ['web'],'prefix' => 'dispatch'], function () {
    Route::get('/{dispatch}/vote/up', ['as' => 'dispatch.vote.up', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@voteUp']);
    Route::get('/{dispatch}/vote/down', ['as' => 'dispatch.vote.down', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@voteUp']);
    Route::get('/{dispatch}/comments', ['as' => 'dispatch.comments', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@comments']);
    Route::post('/{dispatch}/comment', ['as' => 'dispatch.comment.store', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@commentStore']);
});

Route::group(['middleware' => ['web'],'prefix' => 'posts'], function () {
    Route::get('', ['as' => 'posts.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@index']);
});

Route::group(['middleware' => ['web'],'prefix' => 'post'], function () {
    Route::get('/{post}', ['as' => 'post.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@show']);
});