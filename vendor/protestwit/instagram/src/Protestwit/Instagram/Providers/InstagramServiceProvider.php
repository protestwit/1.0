<?php namespace Protestwit\Tweet\Providers;

use App\Comment;
use App\Dispatch;
use App\Event;
use App\Image;
use App\Post;
use App\Tag;
use App\Tweet;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Protestwit\Group\Models\Group;
use Protestwit\Instagram\Instagram;


class TweetServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app[Instagram::class] = $this->app->share(function($app)
        {
            return new Instagram($app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ttwitter'];
    }

}