<?php namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use Searchable;
    protected $fillable = [
        'value',
        'dispatch_id',
        'user_id'
    ];
    
    public function isPositive()
    {
        return $this->value > 0;
    }

    public function isNegative()
    {
        return $this->value < 0;
    }
    
    public function user()
    {
        return $this->hasOne('\App\User','id','user_id');
    }

    public function dispatch()
    {
        return $this->hasOne('\App\Dispatch','id','dispatch_id');
    }

    
}

