<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

/**
 * @description dispatches are broadcasts. By default they are simply published to social media channels.
 * @todo set up to allow for publishing to external emails, facebook, xml feeds etc
 * Class Dispatch
 * @package App
 */
class Dispatch extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'dispatches';

    protected $content;

    protected $fillable = [
        'content',
        'tweet_id'
    ];

    protected $appends = [
        'vote_count',
        'hotness',
        'created_ago_text'
    ];
    protected $searchableColumns = ['content', 'tweet_id'];
    protected $searchableRelations = [];

    public function save(array $options = [])
    {
        if (!isset($this->id) || is_null($this->id)) {
            $this->id = Dispatch::all()->count();
        }

        return parent::save($options);
    }


    public static function updateOrCreate($attributes = [])
    {
        if (isset($attributes['tweet_id'])) {
            \Log::info('tweet id ' . $attributes['tweet_id']);
            $existingDispatch = Dispatch::where('tweet_id', '=', $attributes['tweet_id'])->first();

        } else {
            $existingDispatch = Dispatch::where('content', '=', $attributes['content'])->first();
        }
        if (!$existingDispatch) {
            $existingDispatch = Dispatch::create($attributes);
        } else {
            $existingDispatch->update($attributes);
        }
        return $existingDispatch;
    }




    public function entity()
    {
        if ($this->isTweet()) {
            return $this->tweet();
        }

        if ($this->isPost()) {
            return $this->post();
        }
        if ($this->isLink()) {
            return $this->link();
        }
        if ($this->isEvent()) {
            return $this->event();
        }


    }

    //
    public function getTypeAttribute()
    {
        if ($this->tweet) {
            return 'tweet';
        } elseif ($this->post) {
            return 'post';
        } elseif ($this->link) {
            return 'link';
        } elseif ($this->event) {
            return 'event';
        }
    }

    public function isTweet()
    {
        return $this->type == 'tweet';
    }

    public function isPost()
    {
        return $this->type == 'post';
    }

    public function isLink()
    {
        return $this->type == 'link';
    }

    public function isEvent()
    {
        return $this->type == 'event';
    }


    public function getContentAttribute()
    {
        if ($this->tweet) {
            return $this->tweet->content;
        }

    }

    public function getHoursSinceCreationAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffInHours();
    }

    public function getMinutesSinceCreationAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffInMinutes();
    }

    public function getCreatedAgoTextAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }

    public function getCreatedAtAttribute($value = null)
    {

        if ($this->tweet && $this->tweet->json) {
            $data = json_decode($this->tweet->json);
            $date_array = date_parse($data->created_at);
            $value = date('Y-m-d H:i:s', mktime($date_array['hour'], $date_array['minute'], $date_array['second'], $date_array['month'], $date_array['day'], $date_array['year']));
        }
        return $value;

    }

    public function getAuthorProfileUrlAttribute()
    {
//        dd($this->entity->author_profile_url);
        return $this->entity->author_profile_url;
    }

    public function getAuthorProfileImageUrlAttribute()
    {
        return $this->entity->author_profile_image_url;
    }

    public function getAuthorNameAttribute()
    {
        return $this->entity->author_name;
    }

    public function getAuthorHandleAttribute()
    {
        return $this->entity->author_handle;
    }

    public function getExternalUrlAttribute()
    {
        return $this->entity->external_url;
    }

    public function getCreatedAgoAttribute()
    {
        return $this->entity->created_ago;
    }

    public function getBodyAttribute()
    {
        return $this->entity->body;
    }

    public function getRepliesCountAttribute()
    {
        return $this->entity->replies_count;
    }

    public function getSharesCountAttribute()
    {
        return $this->entity->shares_count;
    }

    public function getLikeCountAttribute()
    {
        return $this->entity->like_count;
    }


    public function getHotnessAttribute()
    {
        if ($this->minutes_since_creation > 0) {
            return (int)(($this->vote_count / $this->minutes_since_creation) * 100);
        }
        return $this->vote_count;

    }

    public function getVoteCountAttribute()
    {
        $vote = $this->votes->sum('value');
        if (isset($this->tweet) && isset($this->tweet->retweet_count)) {
            $retweet_count = $this->tweet->retweet_count;
            $vote += $retweet_count;
        }

        return $vote;
    }


    public function tweet()
    {
//        return $this->embedsOne('\App\Tweet');
        return $this->hasOne('\App\Tweet', 'id', 'tweet_id');
    }

    public function post()
    {
        return $this->belongsTo('\App\Post', 'id', 'post_id');
    }

    public function link()
    {
        return $this->belongsTo('\App\Link', 'id', 'link_id');
    }

    public function event()
    {
        return $this->belongsTo('\App\Event', 'id', 'event_id');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag', 'tags', 'tag_ids');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment', 'dispatch_id', 'id');
    }

    public function votes()
    {
        return $this->hasMany('\App\Vote', 'dispatch_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany('\App\Image', 'dispatch_images', 'dispatch_id', 'image_id');
    }

    public function videos()
    {
        return $this->belongsToMany('\App\Video', 'dispatch_videos', 'dispatch_id', 'video_id');
    }


}

