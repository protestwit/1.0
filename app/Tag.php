<?php

namespace App;

use App\Traits\Searchable;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Tag extends Model
{
    use HybridRelations;
    use Searchable;
    
    
    protected $connection = 'archive';
    protected $collection = 'tags';
    protected $searchableColumns = ['value'];
    protected $searchableRelations = [];
    
    protected $fillable = ['value'];

    public function getRouteKeyName() {
        return 'value';
    }

    public function save(array $options = [])
    {
        if(!isset($this->id))
        {
            $this->id = Tag::where(1,'=',1)->increment('id');
        }

        return parent::save($options); // TODO: Change the autogenerated stub
    }

    /**
     * @param string $string
     * @return array|mixed
     */
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

    public function buildFromContent($content)
    {
        $tags = $this->extractTags($content);
        $tagCollection = $this->newCollection();
        
        foreach($tags as $tag)
        {
            $tagModel = $this->findOrCreate(['value' => $tag]);
            $tagCollection->add($tagModel);
        }

        return $tagCollection;
        
    }
    
    
    
    public static function findOrCreate($attributes = [])
    {
        $existingTag = Tag::where('value','=',strtolower($attributes['value']))->first();
        if(!$existingTag) {
            $existingTag = Tag::create($attributes);
        }
        return $existingTag;
    }

    //Relations

    public function tweets()
    {
        return $this->embedsMany('\App\Tweet','id','tweet_id');
    }

    public function dispatches()
    {
        return $this->belongsToMany('\App\Dispatch','dispatch_tags');
    }

    public function posts()
    {
        return $this->belongsToMany('\App\Post','post_tags');
    }

    public function groups()
    {
        return $this->belongsToMany('\Protestwit\Group\Models\Group','group_tags');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User','user_tags');
    }
    

}