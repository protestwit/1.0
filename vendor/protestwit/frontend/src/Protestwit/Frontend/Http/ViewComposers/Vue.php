<?php namespace Protestwit\Frontend\Http\ViewComposers;

use Illuminate\View\View;
use Protestwit\Frontend\VueView;
use Protestwit\Group\Models\Group;

class Vue
{


    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $viewData = json_decode(json_encode($view),true);
        $vue = new VueView($viewData);
        $view->with('vue', $vue);

    }
}