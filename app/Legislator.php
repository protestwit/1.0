<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Legislator extends Model
{
    use HybridRelations;
    use Searchable;

    protected $connection = 'archive';
    protected $collection = 'legislators';
    protected $fillable = [
        'cid',
        'lastname',
        'firstlast',
        'party',
        'office',
        'gender',
        'first_elected',
        'exit_code',
        'comments',
        'phone',
        'fax',
        'website',
        'webform',
        'congress_office',
        'bioguide_id',
        'votesmart_id',
        'feccandid',
        'twitter_id',
        'youtube_url',
        'facebook_id',
        'birthdate',
    ];
    protected $appends = [
    ];


    protected $searchableColumns = [];
    protected $searchableRelations = [];
}