<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Event extends Model
{
    use HybridRelations;
    use Searchable;
    protected $connection = 'archive';
    protected $collection = 'events';

    protected $fillable = [
        'name',
        'description',
        'date_from',
        'date_to',
        'company_id',
        'cite',
    ];


    public static function findOrCreate($attributes = [])
    {
        if(isset($attributes['company_id'])){
            $existing = Event::where('company_id','=',$attributes['company_id'])->where('name','=','name')->first();
            if (!$existing) {
                $existing= Event::create($attributes);
            }
        }else{
            $existing = Event::getModel();
        }
        return $existing;
    }
    
    
    public function save(array $options = [])
    {
        if(!isset($this->id) || is_null($this->id))
        {
            $this->id = Event::all()->count();
        }
        return parent::save($options);
    }
    
    
    public function company()
    {
        return $this->hasOne('\App\Event','_id','company_id');
        
    }
    
    public function group()
    {
        return $this->belongsToMany('\App\Tag','event_groups','event_id');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag','event_tags','event_id');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment','event_id','_id');
    }

    public function votes()
    {
        return $this->hasMany('\App\Vote','event_id','_id');
    }



}

