<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Comment;
use App\Dispatch;
use App\Post;
use App\Tag;
use App\Vote;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Group\IndexRequest;
use Protestwit\Frontend\Http\Requests\Group\ShowRequest;
use Protestwit\Frontend\Http\Requests\Group\CreateRequest;
use Protestwit\Frontend\Http\Requests\Group\StoreRequest;
use Protestwit\Frontend\Http\Requests\Group\UpdateRequest;

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

        
        return view('frontend::pages.group.show',compact(['request','group','dispatches']));
    }

    public function create(CreateRequest $request)
    {
        return view('frontend::pages.group.create');
    }

    public function store(StoreRequest $request)
    {
        $group = Group::create($request);
        return redirect()->back();
    }

    public function update(UpdateRequest $request, Group $group)
    {
        return view('frontend::pages.group.u');
    }
    
    
    public function index(IndexRequest $request, Group $group)
    {
        $groups = Group::all();
        return view('frontend::pages.group.index',compact(['groups']));
    }


}