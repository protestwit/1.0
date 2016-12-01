<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Searchable;
    protected $searchableColumns = ['value'];
    protected $searchableRelations = [];
    
    protected $fillable = ['value'];

    public function getRouteKeyName() {
        return 'value';
    }




    public function tweets()
    {
        return $this->belongsToMany('\App\Tweet','tweet_tags','tag_id','tweet_id','id_inc');
    }

    public function dispatches()
    {
        return $this->belongsToMany('\App\Dispatch','dispatch_tags');
    }

    public function groups()
    {
        return $this->belongsToMany('\Protestwit\Group\Models\Group','group_tags');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User','user_tags');
    }
    
    public static function findOrCreate($attributes = [])
    {
        $existingTag = Tag::where('value','=',strtolower($attributes['value']))->first();
        if(!$existingTag) {
            $existingTag = Tag::create($attributes);
        }
        return $existingTag;
    }
}
