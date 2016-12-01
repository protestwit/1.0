<?php namespace Protestwit\Frontend\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            'frontend::blocks.nav.top.menu', 'Protestwit\Frontend\Http\ViewComposers\Nav\Top\Menu'
        );
        
        
        $packageDir = realpath(__DIR__.'/..');
        $this->loadViewsFrom($packageDir.'/views', 'frontend');
        include $packageDir.'/Http/routes.php';
    }

    public function register()
    {


    }

}