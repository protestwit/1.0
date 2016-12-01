@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><small class="pull-right">{{$comments->count()}} comments</small> Comments </h1>
            </div>
            <div class="comments-list">
                @foreach($comments as $comment)
                <div class="media">
                    <p class="pull-right"><small>5 days ago</small></p>
                    <div class="media-left">
                        <img class="img-thumbnail media-object" src="{{ $dispatch->tweet->user_avatar_url }}" alt="Avatar">
                    </div>
                    <div class="media-body">

                        <h4 class="media-heading user_name"><i class="glyphicon glyphicon-hand-left"></i>{{$comment->user->screen_name}}</h4>
                        Wow! this is really great.

                        <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                    </div>
                </div>
                @endforeach
            </div>
            {{Form::open(['class' => '','route' => ['dispatch.comment.store',$dispatch]])}}
            <div class="form-group">
                <textarea name="content" class="form-control" rows="5" placeholder="Your comments"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Add</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
@stop
@section('right')
@include('frontend::blocks.nav.right.menu')
@stop