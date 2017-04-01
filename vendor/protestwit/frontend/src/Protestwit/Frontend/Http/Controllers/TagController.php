<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Tag;
use App\Tweet;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Tag\DispatchesRequest;
use Protestwit\Frontend\Http\Requests\Tag\IndexRequest;
use Protestwit\Frontend\Http\Requests\Tag\PostsRequest;
use Protestwit\Frontend\Http\Requests\Tag\ShowRequest;

class TagController extends Controller
{
    public function index(IndexRequest $request)
    {
        $order_by = $request->has('order_by') ? $request->get('order_by') : 'tweet_count';
        $order_dir = $request->has('order_dir') ? $request->get('order_dir') : 'DESC';
        $per_page = $request->has('per_page')? $request->get('per_page') : 100;

        $tags = Tag::getModel();
        $tags = $tags->orderBy($order_by,$order_dir);


        $tags = $tags
            ->with('tweets')
            ->search($request)->paginate($per_page);

        return view('frontend::pages.tag.index',compact(['request','tags']));

    }

    public function posts(PostsRequest $request, Tag $tag)
    {
        $posts = $tag->posts()->paginate();
        return view('frontend::pages.tag.posts',compact(['posts']));
    }

    public function dispatches(DispatchesRequest $request, Tag $tag)
    {
        $dispatches = $tag->dispatches;
        return view('frontend::pages.tag.dispatches',compact(['dispatches','request']));
    }


    public function show(ShowRequest $request, Tag $tag)
    {
        $orderby = 'created_at';

        if($request->has('order_by'))
        {
            $orderby = $request->get('order_by');
        }



        $tweets = $tag->tweets()->distinct()->paginate();
        return view('frontend::pages.tag.show',compact(['request','tag','tweets']));

    }
}