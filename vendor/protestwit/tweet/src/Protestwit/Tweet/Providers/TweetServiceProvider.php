<?php namespace Protestwit\Tweet\Providers;

use App\Comment;
use App\Company;
use App\Dispatch;
use App\Event;
use App\Image;
use App\Post;
use App\Tag;
use App\Tweet;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Protestwit\Group\Models\Group;


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
//        Comment::created('Protestwit\Tweet\Listeners\CommentAfterCreate');
        Dispatch::created('Protestwit\Tweet\Listeners\DispatchAfterCreate');
//        Event::created('Protestwit\Tweet\Listeners\EventAfterCreate');
//        Group::created('Protestwit\Tweet\Listeners\GroupAfterCreate');
//        Image::created('Protestwit\Tweet\Listeners\ImageAfterCreate');
//        Post::created('Protestwit\Tweet\Listeners\PostAfterCreate');
//        Tag::created('Protestwit\Tweet\Listeners\TagAfterCreate');
        Tweet::created('Protestwit\Tweet\Listeners\TweetAfterCreate');
//        Company::created('Protestwit\Tweet\Listeners\CompanyAfterCreate');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app[Twitter::class] = $this->app->share(function($app)
        {
            return new Twitter($app['config'], $app['session.store']);
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