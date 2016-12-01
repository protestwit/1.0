<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Post;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Post\IndexRequest;
use Protestwit\Frontend\Http\Requests\Post\ShowRequest;


class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $posts = Post::where('post_status','=','publish')->where('post_type','=','post')->paginate();
        return view('frontend::pages.post.index',compact(['posts','request']));
    }

    public function show(ShowRequest $request)
    {
        
    }


}