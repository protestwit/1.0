<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Place extends Model
{
    use Searchable;
    use HybridRelations;
    protected $connection = 'archive';
    protected $collection = 'places';
    protected $fillable = [
        'description',
        'place_id',
        'id',
        'reference',
        'adr_address',
        'formatted_address',
        'formatted_phone_number',
        'icon',
        'international_phone_number',
        'name',
        'scope',
        'url',
        'urlutc_offset',
        'vicinity',
        'website',
    ];

    public static function findOrCreate($attributes = [])
    {
        if(isset($attributes['adr_address'])){
            $existing = Place::where('adr_address','=',$attributes['adr_address'])->first();
            if (!$existing) {
                $existing= Place::create($attributes);
            }
        }else{
            $existing = Place::getModel();
        }
        return $existing;
    }

//    public function setMatchedSubstringsAttribute
//    public function setGeometryAttribute($value = null)
//    {
//        $this->geometry = json_encode($value);
//    }
//
//    public function setAddressComponentsAttribute($value = null)
//    {
//        $this->geometry = $value;
//    }
//
//    public function setTypesAttribute($value = null)
//    {
//        $this->types = $value;
//    }
//
//    public function setTermsAttribute($value = null)
//    {
//        $this->terms = $value;
//    }
//
//    public function setStructuredFormattingAttribute($value = null)
//    {
//        $this->structured_formatting = $value;
//    }





    public function companies()
    {
        return $this->belongsToMany('\App\Company','company_places','place_id','id');
    }
        
}
