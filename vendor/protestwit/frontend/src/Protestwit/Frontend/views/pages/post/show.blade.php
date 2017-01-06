@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')
    <div class="row post-header">
        <div class="col-xs-1">
            Add author avatar
        </div>
        <div class="col-xs-1">
            Add vote widget
        </div>
        <div class="col-xs-10">
            <div class="col-xs-12 post-title">{{$post->title}}</div>
            <div class="col-xs-12 post-meta">
                <span class="small">{{$post->created_time_ago}}</span>
                <span class="small">
                    {{$post->author}}
                </span>
            </div>
            <div class="col-xs-12 post-body">
                <p>
                    {{$post->content}}
                </p>
            </div>
        </div>
    </div>
    <div class="row post-comments">
        
    </div>
@stop