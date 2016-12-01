<?php namespace Protestwit\Group\Providers;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $packageDir = realpath(__DIR__.'/..');
        $this->loadViewsFrom($packageDir.'/views', 'group');
        include $packageDir.'/Http/routes.php';
    }

    public function register()
    {


    }

}