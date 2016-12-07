<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Comment;
use App\Dispatch;
use App\Tag;
use App\Vote;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Dispatch\CommentRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\CommentStoreRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\VoteDownRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\VoteUpRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\IndexRequest;
use Protestwit\Group\Models\Group;

class DispatchController extends Controller
{
    public function index(IndexRequest $request, Group $group)
    {
        $orderby = 'created_at';

        if ($request->has('order_by')) {
            $orderby = $request->get('order_by');
        }


        $group_tag = Tag::where('value','=',$group->public_tag)->first();

        $dispatches =
            Dispatch::orderBy($orderby, 'DESC')
            ->search($request)
                ->whereHas('tags',function($q) use ($group_tag){
                    return $q->whereIn('id',$group_tag);
                })
            ->paginate($request->get('per_page'));

        


        return view('frontend::pages.dispatch.index', compact(['request', 'dispatches']));
    }

    public function comments(CommentRequest $request, Dispatch $dispatch)
    {
        $comments = Comment::where('dispatch_id', '=', $dispatch->id)->with('children')->get();


        return view('frontend::pages.dispatch.comment', compact(['request', 'comments', 'dispatch']));

    }


    public function commentStore(CommentStoreRequest $request, Dispatch $dispatch)
    {
        $data = [
            'content' => $request->get('content'),
            'user_id' => \Auth::user()->twitter_id,
        ];

        $comment = Comment::create($data);
        $dispatch->comments()->save($comment);
        return redirect()->back();

    }
    


    public function voteUp(VoteUpRequest $request, Dispatch $dispatch)
    {
        //Check if user has already voted, if so check that it was an up vote if not change it
        $existing_vote = Vote::where('user_id', '=', \Auth::user()->id)->where('dispatch_id', '=', $dispatch->id)->first();
        if ($existing_vote) {
            if ($existing_vote->isNegative()) {
                $existing_vote->update(['value' => 1]);
            }
        }else{
            Vote::create(
                [
                    'user_id' => \Auth::user()->id,
                    'dispatch_id' => $dispatch->id,
                    'value' => 1,
                ]
            );
        }
        return redirect()->back();

    }

    public function voteDown(VoteDownRequest $request, Dispatch $dispatch)
    {
        $existing_vote = Vote::where('user_id', '=', \Auth::user()->id)->where('dispatch_id', '=', $dispatch->id)->first();
        if ($existing_vote) {
            if ($existing_vote->isPositive()) {
                $existing_vote->update(['value' => -1]);
            }

        }else{
            Vote::create(
                [
                    'user_id' => \Auth::user()->id,
                    'dispatch_id' => $dispatch->id,
                    'value' => -1,
                ]
            );
        }
        return redirect()->back();
    }


}