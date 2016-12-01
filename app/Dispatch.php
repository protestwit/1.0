<?php namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * @description dispatches are broadcasts. By default they are simply published to social media channels.
 * @todo set up to allow for publishing to external emails, facebook, xml feeds etc
 * Class Dispatch
 * @package App
 */
class Dispatch extends Model
{
    use Searchable;
    protected $fillable = [
        'content',
        'tweet_id'
    ];
    protected $searchableColumns = ['content', 'tweet_id'];
    protected $searchableRelations = [];

    public static function findOrCreate($attributes = [])
    {
        $existingDispatch = Dispatch::where('content','=',$attributes['content'])->first();
        if(!$existingDispatch) {
            $existingDispatch = Dispatch::create($attributes);
        }
        return $existingDispatch;
    }

    
    
    
    public function getVoteCountAttribute()
    {
        return $this->tweet->retweet_count + $this->votes->sum('value');
    }

    public function tweet()
    {
        return $this->hasOne('\App\Tweet','id_inc','tweet_id');
    }

    public function tags()
    {
//        return $this->belongsToMany('\App\Tag','group_tags');
        return $this->belongsToMany('\App\Tag','dispatch_tags','dispatch_id','tag_id');
    }
    
    public function comments()
    {
        return $this->hasMany('\App\Comment','dispatch_id','id');
    }

    public function votes()
    {
        return $this->hasMany('\App\Vote','dispatch_id','id');
    }
    
    public function images()
    {
        return $this->belongsToMany('\App\Image','dispatch_images','dispatch_id','image_id');
    }


    
}

