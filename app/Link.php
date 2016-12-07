<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Link extends Model
{
    use HybridRelations;
    use Searchable;
    protected $connection = 'archive';
    protected $collection = 'links';

    protected $fillable = [
        'url',
        'name',
        'description',
        'title',
    ];

    public static function findOrCreate($attributes = [])
    {
        if(isset($attributes['company_id'])){
            $existing = Link::where('company_id','=',$attributes['company_id'])->where('url','=','url')->first();
            if (!$existing) {
                $existing= Link::create($attributes);
            }
        }else{
            $existing = Link::getModel();
        }
        return $existing;
    }
    
    
    public function company()
    {
        return $this->belongsToMany('\App\Company','company_links','link_id','id');
    }
    
    public function group()
    {
        return $this->belongsToMany('\App\Tag','link_groups','event_id');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag','link_tags','event_id');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment','link_id','_id');
    }

    public function votes()
    {
        return $this->hasMany('\App\Vote','link_id','_id');
    }



}

