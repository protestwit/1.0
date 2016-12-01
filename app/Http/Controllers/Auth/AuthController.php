<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToTwitter()
    {
//        dd(Socialite::with('twitter'));

        return Socialite::with('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        $twitterUser = Socialite::with('twitter')->user();
        
        $token = $twitterUser->token;
        $id = $twitterUser->id;
        $tokenSecret = $twitterUser->tokenSecret;

        $data = [
            'twitter_id' => $id,
            'name' => isset($twitterUser->name) ? $twitterUser->name : null,
            'screen_name' => isset($twitterUser->nickname) ? $twitterUser->nickname : null,
            'avatar' => isset($twitterUser->avatar) ? $twitterUser->avatar : null,
            'email' => isset($twitterUser->email) ? $twitterUser->email : null,
            'location' => isset($twitterUser->user['location']) ? $twitterUser->user['location'] : null,
            'profile_location' => isset($twitterUser->user['profile_location']) ? $twitterUser->user->utc_offset : null,
            'description' => isset($twitterUser->user['url']) ? $twitterUser->user['url'] : null,
            'url' => isset($twitterUser->user['url']) ? $twitterUser->user['url'] : null,
            'follower_count' => isset($twitterUser->user['follower_count']) ? $twitterUser->user['follower_count'] : 0,
            'friends_count' => isset($twitterUser->user['friends_count']) ? $twitterUser->user['friends_count'] : 0,
            'listed_count' => isset($twitterUser->user['listed_count']) ? $twitterUser->user['listed_count'] : 0,
            'favourites_count' => isset($twitterUser->user['favourites_count']) ? $twitterUser->user['favourites_count'] : 0,
            'utc_offset' => isset($twitterUser->user['utc_offset']) ? $twitterUser->user['utc_offset'] : null,
            'time_zone' => isset($twitterUser->user['time_zone']) ? $twitterUser->user['time_zone'] : null,
            'geo_enabled' => isset($twitterUser->user['geo_enabled']) ? $twitterUser->user['geo_enabled'] : 0,
            'statuses_count' => isset($twitterUser->user['statuses_count']) ? $twitterUser->user['statuses_count'] : 0,
            'lang' => isset($twitterUser->user['lang']) ? $twitterUser->user['lang'] : null,
            'token' => $token,
            'token_secret' => $tokenSecret,
        ];




            $existing_user = User::where('twitter_id', '=', $id)->first();

        if (!isset($existing_user)) {
            //If we don't have an existing user create one
            try {
                $user = User::create($data);
                \Auth::login($user);
                dd(\Auth::user($id));
            } catch (\Exception $e) {
                \Log::info('Error in twitter_create_user_from_tweet '. $e->getMessage());
            }
        }else{
            //The user already exists
            $existing_user->update($data);
            \Auth::login($existing_user);
            return redirect('home');
        }






    }
}
