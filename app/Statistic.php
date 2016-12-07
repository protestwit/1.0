<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Statistic extends Model
{
    use Searchable;
    use HybridRelations;
    protected $connection = 'archive';
    protected $collection = 'statistics';
    protected $fillable = [
        'name',
        'type',
        'start_date',
        'end_date',
        'value',
        'label',
        'cite',
        'company_id',
    ];

    public static function findOrCreate($attributes = [])
    {
        if(isset($attributes['company_id'])){
            $existing = Event::where('company_id','=',$attributes['company_id'])->where('value','=','value')->first();
            if (!$existing) {
                $existing= Statistic::create($attributes);
            }
        }else{
            $existing = Statistic::getModel();
        }
        return $existing;
    }
    
    public function company()
    {
        return $this->hasOne('\App\Company','id','company_id');
    }
        
}
