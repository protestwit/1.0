<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Tag;
use App\Tweet;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Tag\IndexRequest;
use Protestwit\Frontend\Http\Requests\Tag\ShowRequest;

class TagController extends Controller
{
    public function index(IndexRequest $request)
    {
        $orderby = 'created_at';

        if($request->has('order_by'))
        {
            $orderby = $request->get('order_by');
        }


        $tags = Tag::orderBy($orderby,'DESC')
            ->with('tweets')
            ->search($request)
            ->has('tweets','>',40)
            ->get()
            ->sortBy(function($tag){
            return $tag->tweets->count();
        },null,true);
        return view('frontend::pages.tag.index',compact(['request','tags']));

    }

    public function show(ShowRequest $request, Tag $tag)
    {
        $orderby = 'created_at';

        if($request->has('order_by'))
        {
            $orderby = $request->get('order_by');
        }


        $tweets = $tag->tweets()->orderBy($orderby,'DESC')->search($request)->paginate($request->get('per_page'));
        return view('frontend::pages.tag.show',compact(['request','tag','tweets']));

    }
}