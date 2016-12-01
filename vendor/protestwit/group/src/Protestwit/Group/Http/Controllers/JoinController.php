<?php namespace Protestwit\Group\Http\Controllers;


use Illuminate\Routing\Controller;
use Protestwit\Group\Http\Requests\Join\IndexRequest;
use Protestwit\Group\Models\Group;

class JoinController extends Controller
{
    public function index(IndexRequest $request,Group $group)
    {
        return view('group::pages.join.index',compact(['request','group']));
    }

    public function success(IndexRequest $request,Group $group)
    {
        return view('group::pages.join.success',compact(['request','group']));
    }
    public function show()
    {
        
    }
}