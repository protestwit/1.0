<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::post('approve-tweets', ['middleware' => 'auth', function (Illuminate\Http\Request $request) {
    foreach ($request->all() as $input_key => $input_val) {
        if ( strpos($input_key, 'approval-status-') === 0 ) {
            $tweet_id = substr_replace($input_key, '', 0, strlen('approval-status-'));
            $tweet = App\Tweet::where('id',$tweet_id)->first();
            if ($tweet) {
                $tweet->approved = (int)$input_val;
                $tweet->save();
            }
        }
    }
    return redirect()->back();
}]);

Route::get('login', ['as' => 'auth.login', 'uses' => '\App\Http\Controllers\Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => '\App\Http\Controllers\Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => '\App\Http\Controllers\Auth\AuthController@logout']);

Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

Route::get('auth/twitter', ['as' => 'auth.twitter', 'uses' => '\App\Http\Controllers\Auth\AuthController@redirectToTwitter']);
Route::get('auth/twitter/callback', ['as' => 'auth.twitter.callback', 'uses' => '\App\Http\Controllers\Auth\AuthController@handleTwitterCallback']);
