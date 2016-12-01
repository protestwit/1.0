<?php namespace Protestwit\Frontend\Http\ViewComposers\Nav\Top;

use Illuminate\View\View;
use Protestwit\Group\Models\Group;

class Menu
{


    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $groups = Group::with('tags')->get()
            ->sortBy(function($tag){
                return $tag->tweets->count();
            },null,true)->take(20);



        $view->with('groups', $groups);

    }
}