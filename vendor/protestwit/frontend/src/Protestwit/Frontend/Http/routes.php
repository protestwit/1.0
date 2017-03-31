<?php

Route::get('test', ['as' => 'home', 'uses' => 'Protestwit\Frontend\Http\Controllers\TestController@index']);


Route::get('groups', ['as' => 'groups.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@index']);

Route::get('/g/{group}', ['as' => 'group.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@show']);



Route::group(['middleware' => ['web']], function () {
    Route::get('', ['as' => 'home', 'uses' => 'Protestwit\Frontend\Http\Controllers\HomeController@index']);
});


Route::group(['middleware' => ['web'],'prefix' => 'group'], function () {
    Route::get('/', ['as' => 'group.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@index']);
    Route::get('/create', ['as' => 'group.create', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@create']);
    Route::put('/create', ['as' => 'group.store', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@store']);
    Route::get('/{group}/', ['as' => 'group.edit', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@edit']);
    Route::post('/{group}/', ['as' => 'group.update', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@update']);
    //Group Data
    Route::get('/{group}/tweets', ['as' => 'group.tweets.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@tweets']);
    Route::get('/{group}/images', ['as' => 'group.images.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@tweets']);
    Route::get('/{group}/events', ['as' => 'group.events.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@events']);
    Route::get('/{group}/posts', ['as' => 'group.posts.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@tweets']);
    Route::get('/{group}/dispatch', ['as' => 'group.dispatches.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@tweets']);
    Route::get('/{group}', ['as' => 'group.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\GroupController@show']);
});


Route::group(['middleware' => ['web'],'prefix' => 'tags'], function () {
    Route::get('', ['as' => 'tags.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\TagController@index']);
});

Route::group(['middleware' => ['web'],'prefix' => 'tag'], function () {
    Route::get('/{tag}', ['as' => 'tag.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\TagController@show']);
    Route::get('/{tag}/posts', ['as' => 'tag.posts', 'uses' => 'Protestwit\Frontend\Http\Controllers\TagController@posts']);
    Route::get('/{tag}/dispatches', ['as' => 'tag.dispatches', 'uses' => 'Protestwit\Frontend\Http\Controllers\TagController@dispatches']);
});


Route::get('/g/{group}/posts', ['as' => 'posts.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@index']);


Route::group(['middleware' => ['web'],'prefix' => 'post'], function () {
    Route::get('/{post}/vote/up', ['as' => 'post.vote.up', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@voteUp']);
    Route::get('/{post}/vote/down', ['as' => 'post.vote.down', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@voteUp']);
    Route::get('/{post}/comments', ['as' => 'post.comments', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@comments']);
    Route::post('/{post}/comment', ['as' => 'post.comment.store', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@commentStore']);
    Route::get('/create', ['as' => 'post.create', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@create']);
});




Route::group(['middleware' => ['web'],'prefix' => 'tweet'], function () {

    Route::get('/{tweet}/', ['as' => 'tweet.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\TweetController@show']);
    Route::get('/{tweet}/vote/up', ['as' => 'tweet.vote.up', 'uses' => 'Protestwit\Frontend\Http\Controllers\TweetController@voteUp']);
    Route::get('/{tweet}/vote/down', ['as' => 'tweet.vote.down', 'uses' => 'Protestwit\Frontend\Http\Controllers\TweetController@voteUp']);
    Route::get('/{tweet}/comments', ['as' => 'tweet.comments', 'uses' => 'Protestwit\Frontend\Http\Controllers\TweetController@comments']);
    Route::post('/{tweet}/comment', ['as' => 'tweet.comment.store', 'uses' => 'Protestwit\Frontend\Http\Controllers\TweetController@commentStore']);
});

Route::group(['middleware' => ['web'],'prefix' => 'user'], function () {
    Route::get('', ['as' => 'user.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\UserController@index']);
});




Route::get('/g/{group}/dispatches', ['as' => 'dispatches.index', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@index']);


Route::group(['middleware' => ['web'],'prefix' => 'dispatch'], function () {
    Route::get('/{dispatch}/vote/up', ['as' => 'dispatch.vote.up', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@voteUp']);
    Route::get('/{dispatch}/vote/down', ['as' => 'dispatch.vote.down', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@voteUp']);
    Route::get('/{dispatch}/comments', ['as' => 'dispatch.comments', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@comments']);
    Route::post('/{dispatch}/comment', ['as' => 'dispatch.comment.store', 'uses' => 'Protestwit\Frontend\Http\Controllers\DispatchController@commentStore']);
});

Route::get('/g/{group}/comment/{post}', ['as' => 'post.show', 'uses' => 'Protestwit\Frontend\Http\Controllers\PostController@show']);
