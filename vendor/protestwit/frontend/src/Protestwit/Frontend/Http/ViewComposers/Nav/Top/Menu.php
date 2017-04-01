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
        $groups = Group::hot()->with('tags')->get()
            ->sortBy(function($tag){
                return $tag->tweets->count();
            },null,true)->take(8);



        $view->with('groups', $groups);

    }
}