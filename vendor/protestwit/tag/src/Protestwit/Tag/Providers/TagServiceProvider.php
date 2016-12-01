<?php namespace Protestwit\Frontend\Providers;

use App\Tag;
use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Tag::created(function($tag){
            try{
                Artisan::call('tag_after_create', [
                    'tag' => $tag->id,
                ]);

            }catch(\Exception $e)
            {
                \Log::error('error with tag_after_create command ' . $e->getMessage());
            }
        });
    }

    public function register()
    {


    }

}