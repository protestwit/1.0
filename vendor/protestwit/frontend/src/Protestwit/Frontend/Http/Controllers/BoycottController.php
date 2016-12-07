<?php namespace Protestwit\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Boycott\CommentRequest;
use Protestwit\Frontend\Http\Requests\Boycott\CommentStoreRequest;
use Protestwit\Frontend\Http\Requests\Boycott\VoteDownRequest;
use Protestwit\Frontend\Http\Requests\Boycott\VoteUpRequest;
use Protestwit\Frontend\Http\Requests\Boycott\IndexRequest;
use Protestwit\Group\Models\Group;

class BoycottController extends Controller
{
    public function index(IndexRequest $request, Group $group)
    {
        return view('frontend::pages.boycott.index', compact(['request', 'dispatches']));
    }

    



}