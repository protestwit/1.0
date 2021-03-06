<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Tweet extends Model implements \App\Contracts\DispatchableInterface
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'tweets';
    protected $fillable = [
        'id',
        'id_inc',
        'json',
        'tweet_text',
        'user_id',
        'user_screen_name',
        'user_avatar_url',
        'public',
        'user',
        'retweet_count'
    ];
    protected $appends = [
        'tags',
        'author_location',
    ];

    protected $primaryKey = 'id_inc';

    protected $searchableColumns = ['tweet_text', 'user_id', 'user_screen_name', 'json'];
    protected $searchableRelations = [];


    public function getRouteKeyName()
    {
        return 'id';
    }

    public function save(array $options = [])
    {
        $this->hotness_score = $this->hotness;
        $this->retweet_score = $this->retweet_count;
        $this->created_at = $this->getCreatedAtAttribute();

        if (!isset($this->id_inc) || is_null($this->id_inc)) {
            $this->id_inc = Tweet::all()->count();
            \Log::info('Setting Tweet id_inc to: ' . $this->id_inc);
        }

        return parent::save($options); // TODO: Change the autogenerated stub
    }

    public static function updateOrCreate($attributes = [])
    {
        $existingTweet = Tweet::where('id', '=', $attributes['id'])->first();
        if (!$existingTweet) {
            $existingTweet = Tweet::create($attributes);
        } else {
            $existingTweet->update($attributes);
        }
        return $existingTweet;
    }


    public function getAuthorDescriptionAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                return $data->user->description;
            }
            return '';

        }
    }

    public function getAuthorFollowersCountAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                return $data->user->followers_count;
            }
            return '';

        }
    }

    public function getAuthorFriendsCountAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                return $data->user->friends_count;
            }
            return '';

        }
    }

    public function getAuthorListedCountAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                return $data->user->listed_count;
            }
            return '';

        }
    }

    public function getAuthorFavouritesCountAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                return $data->user->favourites_count;
            }
            return '';

        }
    }

    public function getAuthorNameAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                return $data->user->name;
            }
            return '';

        }
    }

    public function getAuthorLocationAttribute()
    {
        if(isset($this->json))
        {

            $data = json_decode($this->json);

            if($data->user)
            {
                \Log::info('location:');
                \Log::info($data->user->location);
                return $data->user->location;
            }
            return '';

        }
    }
    public function getAuthorProfileUrlAttribute()
    {
        return 'https://twitter.com/' . $this->getAuthorHandleAttribute();
    }

    public function getAuthorProfileImageUrlAttribute()
    {
        if (isset($this->user_avatar_url)) {
            return $this->user_avatar_url;
        }
    }

    public function getAuthorHandleAttribute()
    {
        if (isset($this->user_screen_name)) {
            return $this->user_screen_name;
        }
    }

    public function getCreatedAgoAttribute()
    {
        $data = json_decode($this->json);
        $date_array = date_parse($data->created_at);
        $value = date('Y-m-d H:i:s', mktime($date_array['hour'], $date_array['minute'], $date_array['second'], $date_array['month'], $date_array['day'], $date_array['year']));
        return $value;
    }

    public function getExternalUrlAttribute()
    {
        if (isset($this->user) && isset($this->user->screen_name) && isset($this->id)) {
            return 'http://www.twitter.com/'.$this->user->screen_name.'/status/'.$this->id;
        }
    }

    public function getBodyAttribute()
    {
        if (isset($this->tweet_text)) {
            return $this->tweet_text;
        }
    }

    public function getRepliesCountAttribute()
    {
        if (isset($this->comments)) {
            return $this->comments->count();
        }
        return 0;
    }

    public function getSharesCountAttribute()
    {
        if (isset($this->retweet_count)) {
            return $this->retweet_count;
        }
        return 0;
    }

    public function getCreatedAtAttribute($val = null)
    {
        if(isset($val)) return $val;

        if(isset($this->json))
        {
        $data = json_decode($this->json);
        }

        if(isset($data->created_at))
        {
            return Carbon::createFromTimeStamp(strtotime($data->created_at));
        }

        return '';

     }

    public function getHotnessAttribute()
    {
        if ($this->minutes_since_creation > 0) {
            return (int)(($this->retweet_count / $this->minutes_since_creation) * 100);
        }
        return $this->vote_count;

    }

    public function getMinutesSinceCreationAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffInMinutes();
    }

    public function getLikeCountAttribute()
    {
        if (isset($this->dispatch) && isset($this->dispatch->vote_count)) {
            return $this->dispatch->vote_count;
        }
        return 0;
    }

    public function getHottnessAttribute()
    {
        if (isset($this->dispatch) && isset($this->dispatch->vote_count)) {
            return $this->dispatch->vote_count;
        }
        return 0;
    }


    public function extractTags($string = '')
    {
        $return = [];
        preg_match_all("/(#\w+)/", $string, $matches);
        foreach ($matches as $k => $v) {
            $return[] = str_replace('#', '', $v);
        }
        if (isset($return[0])) return $return[0];
        return [];
    }


    public function retweet()
    {
        //Retweet the passed tweet
        \Log::info('Retweeting tweet' . $this->twitter_id);
        if (!$this->is_retweeted) {
            try {
             Twitter::postRt($this->twitter_id);
                $this->is_retweeted = 1;
                $this->save();


            } catch (\Exception $e) {
                \Log::info('Error Retweeting Tweet:' . $this->twitter_id . $e->getMessage());
                $this->is_retweeted = 1;
                $this->save();
            }

            //Find or create dispatch
            $dispatch = Dispatch::findOrCreate([
                'content' => $this->text,
                'tweet_id' => $this->id_inc,
            ]);


            foreach ($this->tags as $tag) {
                $dispatch->tags()->save($tag);
            }
        }
    }

    public function getTagsAttribute()
    {
        return [];
        $tag_ids = DB::table('tags')
            ->join('tweet_tags', 'tags.id', '=', 'tweet_tags.tag_id')
            ->select('id')
            ->where('tweet_tags.tweet_id','=',$this->id_inc)->get();

        return Tag::whereIn('id',$tag_ids)->get();
    }


    public function getRetweetCountAttribute($val = null)
    {
        if (isset($val)) return $val;
        $retweet_count = 0;


        try {
            $retweet_count = $this->json->retweeted_status->retweet_count;
        } catch (\Exception $e) {
            try {

            } catch (\Exception $e) {
                $retweet_count = $this->json->retweet_count;
            }
        }


        return $retweet_count;
    }


    public function getTwitterIdAttribute()
    {
        if (isset($this->json) && isset($this->json->id_str)) {
            return $this->json->id_str;
        } else {
            return $this->id_str;
        }
        return 0;
    }

//    public function getJsonAttribute()
//    {
//        return json_decode($this->attributes['json']);
//    }

    public function getContentAttribute()
    {
        return $this->attributes['tweet_text'];
    }


    public function getTextAttribute()
    {
        return $this->attributes['tweet_text'];
    }


    public function setTextAttribute($value = null)
    {
        $this->attributes['tweet_text'] = $value;
    }


    public function getIdAttributesss($value = null)
    {
        if (is_null($value) || $value == '0') {
            //Fixes issue with the id parameter not being passed by eloquent in the created listener
            $json_array = json_decode($this->attributes['json']);
            return (int)$json_array->id_str;

        }
        return (int)$value;
    }

//    public function getUserAttribute($value = null)
//    {
//        if(is_null($value) || $value == '0')
//        {
//            \Log::info('user is null');
////            \Log::info(print_r($this->attributes['json'],true));
//            //Fixes issue with the id parameter not being passed by eloquent in the created listener
//            $json_array = json_decode($this->attributes['json']);
////            \Log::info(print_r($json_array->user,true));
////            \Log::info('getting user \\n' . print_r($json_array->user,true));
//
//            if(is_object($json_array))
//            {
//                return $json_array->user;
//            }
//        }
//
//        return $value;
//    }

    //Scopes

    public function scopeRecent($query)
    {
        return $query;
    }
    //Relations

    public function author()
    {
        return $this->hasOne('\App\User','twitter_id','author_id');
    }

    public function user()
    {
        return $this->hasOne('\App\User','twitter_id','user_id');
    }


    public function groups()
    {
        return $this->belongsToMany('\Protestwit\Group\Models\Group', 'group_tweets', 'tweet_id', 'group_id');

    }

    public function posts()
    {
        return $this->belongsToMany('\App\Post', 'post_tweets');
    }

    public function comments()
    {
        return $this->belongsToMany('\App\Comment', 'post_tweets');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag', 'tags', 'tweet_ids','tag_ids');

    }
}

