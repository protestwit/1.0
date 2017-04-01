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
            Tweets
        </div>
        <div class="col-md-2">
            Users
        </div>
        <div class="col-md-2">
            Dispatches
        </div>
        <div class="col-md-2">
            Groups
        </div>
    </div>
    @foreach($tags as $tag)
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('tag.show',$tag->value)}}">{{$tag->value}}</a>
        </div>
        <div class="col-md-2">{{$tag->tweet_count}}</div>
        <div class="col-md-2">{{$tag->authors->unique('id')->count()}}</div>
        <div class="col-md-2">{{$tag->dispatches->count()}}</div>
        <div class="col-md-2">{{$tag->groups->count()}}</div>
    </div>
    @endforeach
    </ul>
    <div>
        pag
        {{$tags->links()}}
    </div>
@stop