<?php namespace Protestwit\Frontend\Http\Controllers;

use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Home\IndexRequest;

class HomeController extends Controller
{
    public function index(IndexRequest $request)
    {
        return view('frontend::pages.home.index',compact(['request']));

    }
}