<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;
    protected $table = 'wp_posts';
    protected $fillable = [
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

    public function getPageTemplateAttribute()
    {
        $meta = $this->metas()->where('meta_key','=','_wp_page_template')->first();
        if($meta)
        {
            return $meta->meta_value;
        }
        return '';
    }

    public function getTrashMetaStatusAttribute()
    {
        $meta = $this->metas()->where('meta_key','=','_wp_meta_status')->first();
        if($meta)
        {
            return $meta->meta_value;
        }
        return '';
    }

    public function getTrashMetaTimeAttribute()
    {
        $meta = $this->metas()->where('meta_key','=','_wp_trash_meta_time')->first();
        if($meta)
        {
            return $meta->meta_value;
        }
        return '';
    }

    public function getFeaturedImageAttribute()
    {
        $meta = $this->metas()->where('meta_key','=','_wp_attached_file')->first();
        if($meta)
        {
            return $meta->meta_status;
        }
        return '';
    }



    public function setAuthorAttribute($value = null)
    {
        $this->attributes['post_author'];
    }

    public function getAuthorAttribute()
    {
        return $this->attributes['post_author'];
    }

    public function setCreatedAtAttribute($value = null)
    {
        $this->attributes['post_date'] = $value;
    }

    public function getCreatedAtAttribute()
    {
        return $this->attributes['post_date'];
    }

    public function setContentAttribute($value = null)
    {
        $this->attributes['post_content'];
    }

    public function getContentAttribute()
    {
        return $this->attributes['post_content'];
    }

    public function setTitleAttribute($value = null)
    {
        $this->attributes['post_title'];
    }

    public function getTitleAttribute()
    {
        return $this->attributes['post_title'];
    }



    public function getExcerptAttribute()
    {
        $meta = $this->metas()->where('meta_key','=','excerpt')->first();
        if($meta)
        {
            return $meta->meta_value;
        }
        return '';
    }

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
    
    public function tweets()
    {
        return $this->belongsToMany('App\Tweet','tweet_tags');
    }
}
