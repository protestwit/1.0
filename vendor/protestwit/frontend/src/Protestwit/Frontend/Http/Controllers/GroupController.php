<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Comment;
use App\Dispatch;
use App\Post;
use App\Tag;
use App\Vote;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Group\IndexRequest;
use Protestwit\Frontend\Http\Requests\Group\ShowRequest;

use Protestwit\Group\Models\Group;

class GroupController extends Controller
{
    public function show(ShowRequest $request, Group $group)
    {

                $group_tag_ids = $group->tags()->lists('tags.id')->toArray();

                $dispatches = Dispatch::with('tags')
                    ->with('link')
                    ->with('post')
                    ->with('tweet')

                    ->paginate();

//                $blogroll = Post::all();



//                    ->sortBy(function($tag){
//                        return $tag->tweets->count();
//                    },null,true)->take(20);
        
        
        
        return view('frontend::pages.group.show',compact(['request','group','dispatches']));
    }
    
    
    
    public function index(IndexRequest $request, Group $group)
    {
       
    }


}