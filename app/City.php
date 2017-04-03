<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class City extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'cities';
    protected $fillable = [
        'code',
        'state_code',
        'name',
        'lat',
        'lng',
    ];
    protected $appends = [];

    protected $searchableColumns = ['name', 'code'];
    protected $searchableRelations = [];


    public function findOrCreate($attributes = [])
    {
        if(!isset($attributes['name']) || !isset($attributes['state_code']))
        {
            throw new \Exception('name and state_code must be defined');
        }

        if($existing = City::getModel()->where('state_code','=',$attributes['state_code'])->where('name','=',$attributes['name'])->first())
        {
            $existing->update($attributes);
            return $existing;
        }

        return City::create($attributes);
    }


    public function getStateAttribute()
    {
        return $this->state()->first();
    }

    public function getCountryAttribute()
    {
        return $this->country()->first();
    }

    public function getCountyAttribute()
    {
        return $this->county()->first();
    }



    public function getZipsAttribute()
    {
        return $this->zips()->get();
    }

    public function state()
    {
        return $this->belongsTo('\App\State','city_id','state_id');
    }

    public function zips()
    {
        return $this->belongsToMany('\App\Zip','zipcodes');
    }

    public function country()
    {
        return $this->belongsTo('\App\Country','city_id','country_id');
    }

    public function county()
    {
        return $this->belongsTo('\App\County','city_id','county_id');
    }


}