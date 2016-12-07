<?php namespace Protestwit\Instagram\Facades;

use Illuminate\Support\Facades\Facade;

class Instagram extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Protestwit\Instagram\Instagram'; }

}