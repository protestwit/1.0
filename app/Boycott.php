<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Boycott extends Model
{
    use Searchable;
    use HybridRelations;
    protected $connection = 'archive';
    protected $collection = 'boycotts';
    protected $fillable = [
        'name',
        'user_id',
        'nyse',
        'tag',
    ];


    public static function findOrCreate($attributes = [])
    {
        $existingBoycott = Boycott::where('symbol','=',$attributes['symbol'])->first();
        if(!$existingBoycott) {
            $existingBoycott = Boycott::create($attributes);
        }
        return $existingBoycott;
    }
      
    public function companies()
    {
        
        return $this->belongsToMany('App\Company','boycott_companies','id','company_id');
    }
        
}
