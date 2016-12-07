<?php namespace Protestwit\Group\Models;

use App\Traits\Searchable;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Group extends Model
{
    protected $connection = 'archive';
    protected $collection = 'groups';
    protected $searchableColumns = ['public_tag','name'];
    protected $searchableRelations = [];
    
    use HybridRelations;
    use Searchable;
    
    protected $fillable = [
        'name',
        'public_tag',
        'private_tag',
        'allow_public_subgroups',
        'is_public'
    ];

    public function save(array $options = [])
    {
        
        if(!isset($this->id) || is_null($this->id))
        {
            $this->id= Group::all()->count();

        }

        return parent::save($options);
    }
    
    
    
    
    
    
    //Attributes
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugAttribute($value = null)
    {
        if(isset($value))
        {
          return $value;
        }

        return $this->public_tag;
    }

    public function resetAccessPassword()
    {
        $faker = Faker\Factory::create();
        $this->accessPassword = $faker->word.$faker->numberBetween(1,99);
    }

    public function setAccessPasswordAttribute($value = null)
    {
        $this->attributes['access_password'] = encrypt($value);

    }
    
    public function getAccessPasswordAttribute($value = null)
    {
        return decrypt($value);
    }

    //Relations
    public function tags()
    {
        return $this->belongsToMany('\App\Tag','group_tags');
    }


    public function tweets()
    {
        return $this->belongsToMany('\App\Tweet','group_tweets','group_id','tweet_id');
    }

    public function posts()
    {
        return $this->belongsToMany('\App\Post','group_posts','group_id','post_id');
    }

    public function dispatches()
    {
        return $this->belongsToMany('\App\Dispatch','group_dispatches','group_id','dispatch_id');
    }

    public function images()
    {
        return $this->belongsToMany('\App\Image','group_images','group_id','image_id');
    }
    
    public function parent()
    {
        return $this->hasOne('Protestwit\Group\Models\Group','id','foreign_id');
    }
    
}