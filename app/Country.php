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
    protected $appends = ['states','counties','districts','zipcodes'];

    protected $searchableColumns = ['name', 'code'];
    protected $searchableRelations = [];



}