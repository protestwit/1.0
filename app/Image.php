<?php namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * @description dispatches are broadcasts. By default they are simply published to social media channels.
 * @todo set up to allow for publishing to external emails, facebook, xml feeds etc
 * Class Dispatch
 * @package App
 */
class Image extends Model
{
    use Searchable;
    protected $fillable = [
        'url',
    ];
    protected $searchableColumns = ['url'];
    protected $searchableRelations = [];

    public static function findOrCreate($attributes = [])
    {
        $existingImage = Image::where('url','=',$attributes['url'])->first();
        if(!$existingImage) {
            $existingImage = Image::create($attributes);
        }
        return $existingImage;
    }
    
    public function dispatches()
    {
        return $this->belongsToMany('\App\Dispatch','dispatch_images');
    }
    
}

