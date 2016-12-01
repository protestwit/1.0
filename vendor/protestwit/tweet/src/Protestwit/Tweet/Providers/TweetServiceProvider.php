<?php namespace Protestwit\Tweet\Providers;

use App\Dispatch;
use App\Tweet;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;


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
        Tweet::created('Protestwit\Tweet\Listeners\TweetAfterCreate');
        Dispatch::created('Protestwit\Tweet\Listeners\DispatchAfterCreate');
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