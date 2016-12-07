<?php namespace App;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Company extends Model
{
    use Searchable;
    use HybridRelations;
    protected $connection = 'archive';
    protected $collection = 'companies';
    protected $fillable = [
        'name',
        'symbol',
        'url',
    ];


    public function setStatisticsAttribute(array $value = [])
    {
        foreach($value as $statistic)
        {
            $statistic['company_id'] = $this->id;
            $existingStatistic = Statistic::findOrCreate($statistic);
            $this->statistics()->save($existingStatistic);
        }
    }


    public function setEventsAttribute(array $value = [])
    {
        foreach($value as $event)
        {
            $event['company_id'] = $this->id;
            $existingEvent = Event::findOrCreate($event);
            $this->events()->save($existingEvent);
        }
    }


    public function setLinksAttribute(array $value = [])
    {
        foreach($value as $link)
        {
            $link['company_id'] = $this->id;
            $existingLink = Link::findOrCreate($link);
            $this->links()->save($existingLink);
        }
    }


    public function setAffiliatesAttribute(array $value = [])
    {
        foreach($value as $affiliate)
        {
            $existingCompany = Company::findOrCreate($affiliate);
            $this->affiliates()->save($existingCompany);
        }
    }


    public function setSubsidiariesAttribute(array $value = [])
    {
        foreach($value as $subsidiary)
        {
            $existingCompany = Company::findOrCreate($subsidiary);
            $this->subsidiaries()->save($existingCompany);
        }
    }

    public static function findOrCreate($attributes = [])
    {
        if (isset($attributes['symbol'])) {
            $existingCompany = Company::where('symbol', '=', $attributes['symbol'])->first();
            if (!$existingCompany) {
                $existingCompany = Company::create($attributes);
            }
        }elseif(isset($attributes['name']))
        {
            $existingCompany = Company::where('name', '=', $attributes['name'])->first();
            if (!$existingCompany) {
                $existingCompany = Company::create($attributes);
            }
        }else{
            $existingCompany = Company::create($attributes);
        }
        return $existingCompany;
    }
    
    public function buildPlaces()
    {
        
        
        
        
    }
    
    
    public function stock_quotes()
    {
        return $this->hasMany('Protestwit\Finance\Models\Quote','symbol','symbol');
    }

    public function places()
    {
        return $this->belongsToMany('\App\Place','company_places','company_id','id');
    }
    public function posts()
    {
        return $this->belongsToMany('\App\Post','company_posts','company_id','id');
    }

    public function comments()
    {
        return $this->belongsToMany('\App\Comment','company_comments','company_id','id');
    }
    
    public function images()
    {
        return $this->belongsToMany('\App\Image','company_images','id','image_id');
    }

    public function links()
    {
        return $this->belongsToMany('\App\Link','company_links','id','link_id');
    }

    public function affiliates()
    {
        return $this->hasMany('\App\Company', 'affiliate_parent_id', '_id');
    }

    public function subsidiaries()
    {
        return $this->hasMany('\App\Company', 'subsidiary_parent_id', '_id');
    }

    public function parent()
    {
        return $this->hasMany('\App\Company','id','subsidiary_parent_id');
    }
    
    public function statistics()
    {
        return $this->embedsMany('\App\Statistic','statistic_id','_id');
    }

    public function events()
    {
        return $this->hasMany('\App\Event','company_id','_id');
    }
        
}
