@extends('frontend::layouts.2col-right')
@section('title')
    ProtestWit - Organizing Social Movements, Social Media Matters
@stop

@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')
    <div class="page-header">
        <h1 id="timeline">Dispatches</h1>
    </div>
    <ul class="timeline">
        @foreach($dispatches as $dispatch)
            <li>
                <div>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$dispatch->created_at}}</small></p>
                </div>
                <div class="media">
                    <div class="col-xs-12">
                        @if($dispatch->images->first())
                            <img width="100%" src="{{$dispatch->images->first()->url}}"/>
                        @endif
                    </div>
                </div>
                @include('frontend::blocks.dispatch.votewidget',['upvote_route' => 'dispatch.vote.up','downvote_route' => 'dispatch.vote.down', 'dispatch' => $dispatch])
                <div class="col-xs-7 col-xs-offset-1">
                    <p>{{ str_replace('RT','',$dispatch->content) }}</p>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-3">
                        <a target="_blank" href="https://twitter.com/{{ $dispatch->user_screen_name }}/status/{{ $dispatch->tweet_id }}">
                            View on Twitter
                        </a>
                    </div>
                    <div class="col-xs-5">
                        @include('frontend::blocks.comment.countwidget',['route' => 'dispatch.comments', 'subject' => $dispatch])
                    </div>
                    <div class="comments">
                        @foreach($dispatch->comments as $comment)

                            <div class="col-xs-12">
                                {{$comment->content}}
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    <div class="comment-form">
                        {{Form::open(['route' => ['dispatch.comment.store',$dispatch], 'method' => 'POST'])}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <input class="form-control" name="content">
                            <button class="btn btn-success" type="submit" value="Submit Comment">Test</button>
                        </div>
                        {{\Form::close()}}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{$dispatches->links()}}
    </div>

@stop

@section('right')
    @include('frontend::blocks.nav.group.rightmenu',['group' => $group])
@stop