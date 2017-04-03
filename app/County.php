<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use MongoDB\Operation\Count;

class County extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'counties';
    protected $fillable = [
        'name',
        'state_code',
        'all_county_weights',
    ];
    protected $appends = [];

    protected $searchableColumns = ['tweet_text', 'user_id', 'user_screen_name', 'json'];
    protected $searchableRelations = [];


    public function findOrCreate($attributes = [])
    {
        if(!isset($attributes['name']) || !isset($attributes['state_code']))
        {
            throw new \Exception('name and state_code must be defined');
        }

        if($existing = County::getModel()->where('state_code','=',$attributes['state_code'])->where('name','=',$attributes['name'])->first())
        {
            $existing->update($attributes);
            return $existing;
        }

        return County::create($attributes);
    }


    public function getStateAttribute()
    {
        return $this->state()->first();
    }

    public function getCountryAttribute()
    {
        return $this->country()->first();
    }

    public function getCitiesAttribute()
    {
        return $this->cities()->get();
    }

    public function getZipsAttribute()
    {
        return $this->zips()->get();
    }


    public function state()
    {
        return $this->belongsTo('\App\State','county_id','state_id');
    }

    public function cities()
    {
        return $this->belongsToMany('\App\City','cities');
    }

    public function zips()
    {
        return $this->hasMany('\App\Zip','zipcodes');
    }

    public function country()
    {
        return $this->belongsTo('\App\Country','county_id','country_id');
    }


}