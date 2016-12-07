<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Protestwit\Twitter\Facades\Twitter;

class User extends Authenticatable
{
    use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'avatar',
        'twitter_id',
        'name',
        'screen_name',
        'location',
        'profile_location',
        'description',
        'url',
        'follower_count',
        'friends_count',
        'listed_count',
        'favourites_count',
        'utc_offset',
        'time_zone',
        'geo_enabled',
        'statuses_count',
        'lang',
        'email',
        'password',
        'token',
        'token_secret',
    ];


    protected $searchableColumns = ['url', 'description', 'screen_name', 'name', 'twitter_id'];
    protected $searchableRelations = ['tweets' => 'tweet_text'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', ''
    ];

    public function follow()
    {
        if (!$this->is_following) {
            \Log::info('Following User: ' . $this->screen_name . 'Id: ' . $this->twitter_id);
            $data = [
                'user_id' => $this->twitter_id,
            ];
            try {
                Twitter::postFollow($data);
                $this->is_following = 1;
                $this->save();
            } catch (\Exception $e) {
                \Log::info('Error Following User: ' . $this->screen_name . ' Error: ' . $e->getMessage());
            }
        }
    }


    public static function findOrCreate($attributes = [])
    {
        $existingUser = User::where('twitter_id', '=', $attributes['twitter_id'])->first();
        if (!$existingUser) {
            $existingUser = User::create($attributes);
        }
        return $existingUser;
    }

    //Relations
    public function tags()
    {
        return $this->belongsToMany('\App\Tag', 'user_tags');
    }


    public function tweets()
    {
        return $this->hasMany('\App\Tweet', 'user_id', 'twitter_id');
    }

    public function setScreenNameAttribute($value = null)
    {
        $this->attributes['screen_name'] = $value;
        $this->handle = $value;
        return $this;
    }

    public function setTokenAttribute($value = null)
    {
        try {
            $this->attributes['token'] = encrypt($value);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function getTokenAttribute($value = null)
    {
        try {
            return decrypt($value);
        } catch (\Exception $e) {
            return '';
            \Log::error($e->getMessage());
        }
    }

    public function setSecretTokenAttribute($value = null)
    {
        try {
            $this->attributes['secret_token'] = encrypt($value);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function getSecretTokenAttribute($value = null)
    {
        try {
            return decrypt($value);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return '';
        }
    }

}
