<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Status extends Model
{
    use Searchable;
    use HybridRelations;
    protected $connection = 'archive';
    protected $collection = 'checkin';
    protected $fillable = [
        'place_id',
        'date',
    ];
    
    public function user()
    {
        return $this->hasOne('\App\User','twitter_id','user_id');
    }
    
}
