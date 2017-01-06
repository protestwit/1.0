<?php

namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Protestwit\Group\Models\Group;

class Post extends Model
{
    use HybridRelations;
    use Searchable;
    protected $connection = 'archive';
    protected $collection = 'posts';

    protected $fillable = [
        'title',
        'content',
        'post_author',
        'post_date',
        'post_date_gmt',
        'post_content',
        'post_title',
        'post_excerpt',
        'post_status',
        'comment_status',
        'ping_status',
        'post_name',
    ];
    
    
    
    //Relations
    public function metas()
    {
        return $this->hasMany('\App\PostMeta','post_id','ID');
    }
    
    //Attributes

//    public function getPageTemplateAttribute()
//    {
//        $meta = $this->metas()->where('meta_key','=','_wp_page_template')->first();
//        if($meta)
//        {
//            return $meta->meta_value;
//        }
//        return '';
//    }
//
//    public function getTrashMetaStatusAttribute()
//    {
//        $meta = $this->metas()->where('meta_key','=','_wp_meta_status')->first();
//        if($meta)
//        {
//            return $meta->meta_value;
//        }
//        return '';
//    }
//
//    public function getTrashMetaTimeAttribute()
//    {
//        $meta = $this->metas()->where('meta_key','=','_wp_trash_meta_time')->first();
//        if($meta)
//        {
//            return $meta->meta_value;
//        }
//        return '';
//    }
//
//    public function getFeaturedImageAttribute()
//    {
//        $meta = $this->metas()->where('meta_key','=','_wp_attached_file')->first();
//        if($meta)
//        {
//            return $meta->meta_status;
//        }
//        return '';
//    }


    //Author
    public function getAuthorFullNameAttribute()
    {
        if(isset($this->author) && is_object($this->author) && $this->author->full_name)
        {
            return $this->author->full_name;
        }elseif(isset($this->author))
        {
            return $this->author;
        }
        return 'Anonymous';
    }
    
    //Images
    public function getLeadImageAttribute()
    {
        if($this->images)
        {
            if($this->images->first())
            {
            return $this->groups->first();
            }

        }

        return Image::getModel();
        
    }
    
    

    //Group
    /**
     * @return mixed|string
     */
    public function getGroupNameAttribute()
    {
        if($this->groups)
        {
            if($this->groups->first() && isset($this->groups->first()->name))
            {
                return $this->groups->first()->name;
            }


        }elseif(isset($this->group))
        {
            if(is_object($this->group))
            {
                if(isset($this->group->name))
                {
                    return $this->group->name;
                }else{
                    return '';
                }

            }else{
                return $this->group;
            }
        }
        return '@todo name';
    }





    public function setAuthorAttribute($value = null)
    {
        $this->attributes['post_author'];
    }

    public function getAuthorAttribute()
    {
        if(isset($this->attributes['post_author'])) {
            return $this->attributes['post_author'];
        }
    }

    public function setCreatedAtAttribute($value = null)
    {

        $this->attributes['post_date'] = $value;
    }

    public function getCreatedAtAttribute()
    {
        if(isset($this->attributes['post_date'])) {
            return $this->attributes['post_date'];
        }
    }


    public function setPostTextAttribute($value = null)
    {
        $this->attributes['post_content'] = $value;
    }
    public function setContentAttribute($value = null)
    {
        $this->attributes['post_content'] = $value;
        return $this;
    }

    public function getContentAttribute()
    {
        if(isset($this->attributes['post_content']))
        {
        return $this->attributes['post_content'];
        }
    }

    public function setTitleAttribute($value = null)
    {
        $this->attributes['post_title'] = $value;
        return $this;
    }

    public function getTitleAttribute()
    {
        if(isset($this->attributes['post_title']))
        {
        return $this->attributes['post_title'];
        }
        return '';
    }



//    public function getExcerptAttribute()
//    {
//        $meta = $this->metas()->where('meta_key','=','excerpt')->first();
//        if($meta)
//        {
//            return $meta->meta_value;
//        }
//        return '';
//    }

    public function setStatusAttribute($value = null)
    {
        $this->attributes['post_status'];
    }

    public function getStatusAttribute()
    {
        return $this->attributes['post_status'];
    }

    public function setCommentStatusAttribute($value = null)
    {
        $this->attributes['comment_status'];
    }

    public function getCommentStatusAttribute()
    {
        return $this->attributes['comment_status'];
    }

    public function setNameAttribute($value = null)
    {
        $this->attributes['post_name'];
    }

    public function getNameAttribute()
    {
        return $this->attributes['post_name'];
    }
    
    //Relations

    public function company()
    {
        return $this->belongsTo('\App\Company','id','company_id');
    }

    public function post()
    {
        return $this->hasOne('\App\Dispatch','id','dispatch_id');
    }
    
    public function tweets()
    {
        return $this->belongsToMany('App\Tweet','post_tweets');
    }
    
    public function images()
    {
        return $this->belongsToMany('App\Image','post_images');
    }

//    public function setGroupAttribute($value = [])
//    {
//        $data = [];
//
//        if(isset($value['id']) || isset($value['_id']))
//        {
//            $data['id'] = isset($value['_id']) ? $value['_id'] :  $value['id'];
//            $existing = Group::where('id','=',$data['id'])->first();
//
//        }else{
//            $existing = Group::create($value);
//        }
//
//        $this->groups()->save($existing);
//
//    }

    
    public function groups()
    {
        return $this->belongsToMany('\Protestwit\Group\Models\Group','group_posts','group_id','post_id');
    }


    public function setEventAttribute($value = [])
    {
        $data = [];
        if(isset($value['id']) || isset($value['_id']))
        {
            $data['id'] = isset($value['_id']) ? $value['_id'] :  $value['id'];
            $existing = Event::where('id','=',$data['id'])->first();

        }else{
            $existing = Group::create($value);
        }

        $this->events()->save($existing);
    }



    

    public function events()
    {
        return $this->belongsToMany('\App\Event','event_posts','event_id','post_id');
    }




    public function tags()
    {
        return $this->belongsToMany('App\Tag','post_tags');
    }
}
