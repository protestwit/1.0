<?php namespace Protestwit\Twitter\Providers;

use Illuminate\Support\ServiceProvider;

use Protestwit\Twitter\Twitter;

class TwitterServiceProvider extends ServiceProvider {

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
		//
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