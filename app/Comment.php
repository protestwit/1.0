<?php namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Searchable;
    protected $fillable = [
        'content',
        'user_id',
        'dispatch_id',
        'parent_id',
    ];

    public function dispatch()
    {
        return $this->hasOne('\App\Dispatch','id','dispatch_id');
    }

    public function parent()
    {
        return $this->hasOne('\App\Comment','id','parent_id');
    }

    public function children()
    {
        return $this->hasMany('\App\Comment','parent_id','id');
    }

    public function user()
    {
        return $this->hasOne('\App\User','twitter_id','user_id');
    }
    
}
