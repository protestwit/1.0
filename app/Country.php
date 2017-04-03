<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Country extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'countries';
    protected $fillable = [
        'code',
        'name',
    ];
    protected $appends = [];

    protected $searchableColumns = ['name', 'code'];
    protected $searchableRelations = [];

    public function findOrCreate($attributes = [])
    {
        if(!isset($attributes['name']) || !isset($attributes['code']))
        {
            throw new \Exception('name and code must be defined');
        }

        if($existing = Country::getModel()->where('code','=',$attributes['code'])->first())
        {
            $existing->update($attributes);
            return $existing;
        }

        return Country::create($attributes);
    }


    public function states()
    {
        return $this->belongsToMany('\App\State','states');
    }



}