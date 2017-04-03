<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class State extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'states';
    protected $fillable = [
        'code',
        'name'
    ];
    protected $appends = [

    ];


    protected $searchableColumns = ['code', 'name'];


    public function findOrCreate($attributes = [])
    {
        if(!isset($attributes['code']))
        {
            throw new \Exception('code must be defined');
        }

        if($existing = State::getModel()->where('code','=',$attributes['code'])->first())
        {
            $existing->update($attributes);
            return $existing;
        }

        return State::create($attributes);
    }


    public function getCountryAttribute()
    {
        return $this->country()->first();
    }

    public function getCountiesAttribute()
    {
        return $this->counties()->get();
    }

    public function getCitiesAttribute()
    {
        return $this->cities()->get();
    }

    public function getZipsAttribute()
    {
        return $this->zips()->get();
    }


    public function cities()
    {
        return $this->belongsToMany('\App\City','cities');
    }

    public function counties()
    {
        return $this->belongsToMany('\App\County','counties');
    }

    public function zips()
    {
        return $this->hasMany('\App\Zip','zipcodes');
    }

    public function country()
    {
        return $this->belongsTo('\App\Country','state_id','country_id');
    }

}