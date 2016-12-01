<?php namespace Protestwit\Group\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'public_tag',
        'private_tag',
        'allow_public_subgroups',
        'is_public'
    ];
    //Attributes
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugAttribute($value = null)
    {
        if(isset($value))
        {
          return $value;
        }

        return $this->public_tag;
    }

    public function resetAccessPassword()
    {
        $faker = Faker\Factory::create();
        $this->accessPassword = $faker->word.$faker->numberBetween(1,99);
    }

    public function setAccessPasswordAttribute($value = null)
    {
        $this->attributes['access_password'] = encrypt($value);

    }
    
    public function getAccessPasswordAttribute($value = null)
    {
        return decrypt($value);
    }

    //Relations
    public function tags()
    {
//        return $this->belongsToMany('\App\Tag','group_tags');
        return $this->belongsToMany('\App\Tag','group_tags','group_id','tag_id');
    }


    public function tweets()
    {
        return $this->hasManyThrough('\App\Tweet','\App\Tag','id','id_inc','id');
    }



    
    public function parent()
    {
        return $this->hasOne('Protestwit\Group\Models\Group','id','foreign_id');
    }
    
}