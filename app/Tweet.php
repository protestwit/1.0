<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Protestwit\Twitter\Facades\Twitter;

class Tweet extends Model
{
    use Searchable;
    protected $fillable = [
        'id',
        'json',
        'tweet_text',
        'user_id',
        'user_screen_name',
        'user_avatar_url',
        'public',
        'user',
        'retweet_count'
    ];

    protected $primaryKey = 'id_inc';

    protected $searchableColumns = ['tweet_text', 'user_id', 'user_screen_name', 'json'];
    protected $searchableRelations = [];

    public function extractTags($string = '')
    {
        $return = [];
        preg_match_all("/(#\w+)/", $string, $matches);
        foreach($matches as $k => $v)
        {
            $return[] = str_replace('#','',$v);
        }
        if(isset($return[0])) return $return[0];
        return [];
    }



    public function retweet()
    {

        //Retweet the passed tweet
        \Log::info('Retweeting tweet' . $this->twitter_id);
        if (!$this->is_retweeted) {
            try {
//                Twitter::postRt($this->twitter_id);
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
//            \Log::info(print_r($this->tags,true));
//            \Log::info($this->tags()->toSql());

//            \Log::info(print_r($this->tags,true));

            foreach($this->tags as $tag)
            {
                $dispatch->tags()->save($tag);
            }
        }
    }

//    public function getTagsAttribute()
//    {
//        $tag_ids = DB::table('tags')
//            ->join('tweet_tags', 'tags.id', '=', 'tweet_tags.tag_id')
//            ->select('id')
//            ->where('tweet_tags.tweet_id','=',$this->id_inc)->get();
//
//        return Tag::whereIn('id',$tag_ids);
//    }


    public function tags()
    {

        return $this->belongsToMany('\App\Tag','tweet_tags','tweet_id','tag_id');

    }
    
    public function getTwitterIdAttribute()
    {
        return $this->json->id_str;
    }
    
    public function getJsonAttribute()
    {
        return json_decode($this->attributes['json']);
    }
    
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
        if(is_null($value) || $value == '0')
        {
            //Fixes issue with the id parameter not being passed by eloquent in the created listener
            $json_array = json_decode($this->attributes['json']);
            return (int)$json_array->id_str;

        }
        return (int)$value;
    }

    public function getUserAttribute($value = null)
    {
        if(is_null($value) || $value == '0')
        {
            \Log::info('user is null');
//            \Log::info(print_r($this->attributes['json'],true));
            //Fixes issue with the id parameter not being passed by eloquent in the created listener
            $json_array = json_decode($this->attributes['json']);
//            \Log::info(print_r($json_array->user,true));
//            \Log::info('getting user \\n' . print_r($json_array->user,true));

            if(is_object($json_array))
            {
                return $json_array->user;
            }
        }

        return $value;
    }



    //Relations


    public function user()
    {
        return $this->belongsTo('\App\User','twitter_id','user_id');
    }
}

