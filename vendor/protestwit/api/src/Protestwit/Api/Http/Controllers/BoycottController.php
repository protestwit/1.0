<?php namespace Protestwit\Api\Http\Controllers;

use App\Boycott;
use App\Dispatch;
use Illuminate\Routing\Controller;
use Protestwit\Api\Http\Requests\Dispatch\IndexRequest;
use Protestwit\Api\Http\Requests\Dispatch\DestroyRequest;
use Protestwit\Api\Http\Requests\Dispatch\StoreRequest;
use Protestwit\Api\Http\Requests\Dispatch\UpdateRequest;

class BoycottController extends Controller
{
    public function index(IndexRequest $request)
    {
       return Boycott::
            orderBy('created_at','DESC')->
        with(['companies' => function ($q) { 
                          
            $q->with(['affiliates' => function ($q) { 
                $q->with('places');
                $q->with('posts');
                $q->with('comments');
                $q->with('stock_quotes');               
                $q->with('images');               
                $q->with('links');               
                $q->with('events');               
            }]);               
            $q->with(['subsidiaries' => function($q){
                $q->with('places');
                $q->with('posts');
                $q->with('comments');
                $q->with('stock_quotes');
                $q->with('images');
                $q->with('links');
                $q->with('events');
            }]);
            $q->with('places');
            $q->with('posts');
            $q->with('stock_quotes');               
            $q->with('images');               
            $q->with('links');               
            $q->with('events');               
        }])->

            paginate(200);

        
    }

    public function destroy(IndexRequest $request, Dispatch $dispatch)
    {


    }

    public function update(UpdateRequest $request, Dispatch $dispatch)
    {


    }

    public function store(StoreRequest $request, Dispatch $dispatch)
    {


    }
    
    
}