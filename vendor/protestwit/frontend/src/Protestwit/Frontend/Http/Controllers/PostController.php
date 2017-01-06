<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Post\IndexRequest;
use Protestwit\Frontend\Http\Requests\Post\ShowRequest;
use Protestwit\Frontend\Http\Requests\Post\CreateRequest;
use Protestwit\Frontend\Http\Requests\Post\StoreRequest;
use Protestwit\Group\Models\Group;


class PostController extends Controller
{
    public function index(IndexRequest $request, Group $group)
    {
        $orderby = 'created_at';

        if ($request->has('order_by')) {
            $orderby = $request->get('order_by');
        }

        $posts =
            $group->posts()
                ->search($request)
                ->paginate($request->get('per_page'));

        $posts = Post::where('id','!=',1)
            ->search($request)
            ->paginate($request->get('per_page'));

        return view('frontend::pages.post.index',compact(['posts','group','request']));
    }
    
    public function create(CreateRequest $request)
    {
        $user = User::all()->first(); //@todo this should be the auth user instead

        $post = Post::create([
            'post_author' => json_encode($user),
        ]);


        return view('frontend::pages.post.create',compact(['post','request']));
    }

    public function store(StoreRequest $request)
    {
        $author = User::all()->first();

        $data = array_merge_recursive($request->all(),
            [
                'author_id' => $author->id,
                'author' => $author,
            ]);

        $post = Post::create($request);


    }

    public function show(ShowRequest $request, Group $group, Post $post)
    {
        return view('frontend::pages.post.show',compact(['post','request']));
        
    }


}