<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Dispatch;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Home\IndexRequest;

class HomeController extends Controller
{
    public function index(IndexRequest $request)
    {
        $order_by = $request->has('order_by') ? $request->get('order_by') : 'hotness_score';
        $order_dir = $request->has('order_dir') ? $request->get('order_dir') : 'DESC';



        $dispatches = Dispatch::
        orderBy($order_by,$order_dir)->
        with('tweet')->
        with('post')->
        with('link')->
        with('tags')->
        with('comments')->
        with(['images' => function ($q) {
            $q->with(['posts' => function ($q) {
//                $q->with('author');
                $q->with('images');
                $q->with('comments');
                $q->with('events');

            }]);

        }])->
        paginate();

        
        return view('frontend::pages.home.index',compact(['request','dispatches','request']));

    }
}