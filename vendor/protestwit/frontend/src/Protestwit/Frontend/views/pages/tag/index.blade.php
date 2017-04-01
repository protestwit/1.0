@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            Tag
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['sort_by' => 'tweet_count'])}}">Tweets</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['sort_by' => 'user_count'])}}">Users</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['sort_by' => 'dispatch_count'])}}">Dispatches</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('tags.index',['sort_by' => 'group_count'])}}">Groups</a>
        </div>
    </div>
    @foreach($tags as $tag)
    <div class="row">
        <div class="col-xs-1">Actions</div>
        <div class="col-md-3">
            <a href="{{route('tag.show',$tag->value)}}">{{$tag->value}}</a>
        </div>
        <div class="col-md-2">{{$tag->tweet_count}}</div>
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