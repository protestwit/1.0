<?php namespace Protestwit\Api\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function boot()
    { 
        $packageDir = realpath(__DIR__.'/..');
        include $packageDir.'/Http/routes.php';
    }

    public function register()
    {


    }

}