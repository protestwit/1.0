<?php namespace Protestwit\Api\Http\Controllers;

use App\Dispatch;
use Illuminate\Routing\Controller;
use Protestwit\Api\Http\Requests\Dispatch\IndexRequest;
use Protestwit\Api\Http\Requests\Dispatch\DestroyRequest;
use Protestwit\Api\Http\Requests\Dispatch\StoreRequest;
use Protestwit\Api\Http\Requests\Dispatch\UpdateRequest;

class DispatchController extends Controller
{
    public function index(IndexRequest $request)
    {
        return Dispatch::
            orderBy('created_at','DESC')->
        with(['post'])->
        with(['tweet'])->
        with(['tags'])->
        with(['images'])->
        with(['comments'])->
            paginate(200);

        
        
    }


    public function destroy(DestroyRequest $request, Dispatch $dispatch)
    {
        return Dispatch::destroy($dispatch->id);

    }

    public function update(UpdateRequest $request, Dispatch $dispatch)
    {
        return $dispatch->update($request->all());

    }

    public function store(StoreRequest $request, Dispatch $dispatch)
    {
        return Dispatch::create($request->all());

    }
    
    
}