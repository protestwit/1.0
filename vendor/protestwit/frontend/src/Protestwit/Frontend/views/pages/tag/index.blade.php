@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            Tag
        </div>
        <div class="col-md-1">
            <a href="{{route('tags.index',['order_by' => 'hotness_score','order_dir' => 'desc'])}}">Heat</a>
        </div>
        <div class="col-md-1">
            <a href="{{route('tags.index',['order_by' => 'tweet_count','order_dir' => 'desc'])}}">Tweets</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['order_by' => 'user_count','order_dir' => 'desc'])}}">Users</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['order_by' => 'dispatch_count','order_dir' => 'desc'])}}">Dispatches</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['order_by' => 'group_count','order_dir' => 'desc'])}}">Groups</a>
        </div>
    </div>
    @foreach($tags as $tag)
    <div class="row">
        <div class="col-xs-1">Actions</div>
        <div class="col-md-3">
            <a href="{{route('tag.show',$tag->value)}}">{{$tag->value}}</a>
        </div>
        <div class="col-md-1">{{round($tag->hotness_score,2)}}</div>
        <div class="col-md-1">{{$tag->tweets()->distinct()->count()}}</div>
        <div class="col-md-2">{{$tag->author_count}}</div>
        <div class="col-md-2">{{$tag->dispatches->count()}}</div>
        <div class="col-md-2">{{$tag->groups->count()}}</div>
    </div>
    @endforeach
    </ul>
    <div>
        {{$tags->appends($request->except('page'))->links()}}
    </div>
@stop