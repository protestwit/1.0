<?php namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use Searchable;
    protected $fillable = [
        'content',
        'tweet_id'
    ];

    public function getVoteCountAttribute()
    {
        return $this->tweet->retweet_count + $this->votes->sum('value');
    }

    public function tweet()
    {
        return $this->hasOne('\App\Tweet','id','tweet_id');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag','tweet_tags','tweet_id');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment','dispatch_id','id');
    }

    public function votes()
    {
        return $this->hasMany('\App\Vote','dispatch_id','id');
    }



}

