@extends('frontend::layouts.2col-right')
@section('title')
    ProtestWit - Organizing Social Movements, Social Media Matters
@stop

@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')

    <style>
        .timeline {
            list-style: none;
            padding: 20px 0 20px;
            position: relative;
        }

        .timeline:before {
            top: 0;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 3px;
            background-color: #eeeeee;
            left: 50%;
            margin-left: -1.5px;
        }

        .timeline > li {
            margin-bottom: 20px;
            position: relative;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

        .timeline > li > .timeline-panel + .timeline-panel-inverted
        {
            margin-left:50px;
        }

        .timeline > li > .timeline-panel:before {
            position: absolute;
            top: 26px;
            right: -15px;
            display: inline-block;
            border-top: 15px solid transparent;
            border-left: 15px solid #ccc;
            border-right: 0 solid #ccc;
            border-bottom: 15px solid transparent;
            content: " ";
        }

        .timeline > li > .timeline-panel:after {
            position: absolute;
            top: 27px;
            right: -14px;
            display: inline-block;
            border-top: 14px solid transparent;
            border-left: 14px solid #fff;
            border-right: 0 solid #fff;
            border-bottom: 14px solid transparent;
            content: " ";
        }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li > .timeline-badge + .timeline-badge {
            top: 75px;
        }




        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

        .timeline > li.timeline-inverted > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        .timeline > li.timeline-inverted > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }

        .timeline-badge.primary {
            background-color: #2e6da4 !important;
        }

        .timeline-badge.success {
            background-color: #3f903f !important;
        }

        .timeline-badge.warning {
            background-color: #f0ad4e !important;
        }

        .timeline-badge.danger {
            background-color: #d9534f !important;
        }

        .timeline-badge.info {
            background-color: #5bc0de !important;
        }

        .timeline-title {
            margin-top: 0;
            color: inherit;
        }

        .timeline-body > p,
        .timeline-body > ul {
            margin-bottom: 0;
        }

        .timeline-body > p + p {
            margin-top: 5px;
        }
    </style>


    <div class="page-header">
        <h1 id="timeline">Dispatches</h1>
    </div>
    <ul class="timeline">
        @foreach($dispatches as $dispatch)
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$dispatch->created_at}}</small></p>
                    </div>
                    <div class="media">
                        <div class="col-xs-12">
                        @if($dispatch->images->first())
                            <img width="100%" src="{{$dispatch->images->first()->url}}"/>
                        @endif
                        </div>
                    </div>
                    <div class="timeline-body">
                        @include('frontend::blocks.dispatch.votewidget',['upvote_route' => 'dispatch.vote.up','downvote_route' => 'dispatch.vote.down', 'dispatch' => $dispatch])
                        <div class="col-xs-1 col-xs-offset-1">
                            <img width="100px" class="img-thumbnail media-object" src="{{ $dispatch->user_avatar_url }}" alt="Avatar">
                        </div>
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
                        </div>
                    </div>
                </div>
                <div class="timeline-panel timeline-panel-inverted">
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