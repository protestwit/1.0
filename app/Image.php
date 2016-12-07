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
class Image extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'images';
    
    protected $fillable = [
        'url',
    ];
    protected $searchableColumns = ['url'];
    protected $searchableRelations = [];

    public static function findOrCreate($attributes = [])
    {
        $existingImage = Image::where('url','=',$attributes['url'])->first();
        if(!$existingImage) {
            $existingImage = Image::create($attributes);
        }
        return $existingImage;
    }
    
    public function dispatches()
    {
        return $this->belongsToMany('\App\Dispatch','dispatch_images');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','image_tags');
    }

    public function groups()
    {
        return $this->belongsToMany('\Protestwit\Group\Models\Group','group_images','image_id','group_id');
    }

    public function tweets()
    {
        return $this->belongsToMany('\App\Tweet','tweet_images','image_id','tweet_id');
    }

    public function posts()
    {
        return $this->belongsToMany('\App\Post','post_images','image_id','post_id');
    }
    
}

