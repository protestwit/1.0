<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Zip extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'zipcodes';
    protected $fillable = [
        'code',
        'lat',
        'lng',
        'city',
        'state',
        'zcta',
        'parent_zcta',
        'county_fips',
        'county_weight',
        'all_county_weights',
        'imprecise',
        'military',
    ];
    protected $appends = [];

    protected $searchableColumns = ['state', 'country','city','county'];
    protected $searchableRelations = [];


    public function findOrCreate($attributes = [])
    {
        if(!isset($attributes['code']))
        {
            throw new \Exception('name and state_code must be defined');
        }

        if($existing = Zip::getModel()->where('code','=',$attributes['code'])->first())
        {
            $existing->update($attributes);
            return $existing;
        }

        return Zip::create($attributes);
    }


    public function getStateAttribute()
    {
        return $this->state()->first();
    }
    public function getCountyAttribute()
    {
        return $this->county()->first();
    }

    public function getCountryAttribute()
    {
        return $this->country()->first();
    }

    public function getCityAttribute()
    {
        return $this->city()->first();
    }



    public function city()
    {
        return $this->belongsTo('\App\City','zip_id','city_id');
    }

    public function state()
    {
        return $this->belongsTo('\App\State','zip_id','state_id');
    }

    public function county()
    {
        return $this->belongsTo('\App\County','zip_id','county_id');
    }
}