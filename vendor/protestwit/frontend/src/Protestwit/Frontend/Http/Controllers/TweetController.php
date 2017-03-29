<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Comment;
use App\Dispatch;
use App\Tag;
use App\Tweet;
use App\Vote;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Tweet\CommentRequest;
use Protestwit\Frontend\Http\Requests\Tweet\CommentStoreRequest;
use Protestwit\Frontend\Http\Requests\Tweet\VoteDownRequest;
use Protestwit\Frontend\Http\Requests\Tweet\VoteUpRequest;
use Protestwit\Frontend\Http\Requests\Tweet\IndexRequest;
use Protestwit\Group\Models\Group;

class TweetController extends Controller
{
    public function index(IndexRequest $request, Group $group)
    {
        dd('test');
        $orderby = 'created_at';

        if ($request->has('order_by')) {
            $orderby = $request->get('order_by');
        }

        $tweets =
            $group->tweets()
            ->search($request)
        ->paginate($request->get('per_page'));


        $tag_ids = Tag::where('value','=',$group->public_tag)->orWhere('value','=',$group->private_tag)->lists('id')->toArray();


        $tweets = Tweet::whereIn('tweet.tags.id',$tag_ids)->paginate();

        return view('frontend::pages.tweet.index', compact(['request', 'tweets']));
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
            'dispatch_id' => $dispatch->id,
        ];

        Comment::create($data);
        return redirect()->back();

    }
    


    public function voteUp(VoteUpRequest $request, Dispatch $dispatch)
    {
//        dd($dispatch->toArray());
//        dd(\Auth::user()->id);
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