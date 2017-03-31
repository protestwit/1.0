@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')
    @include('frontend::blocks.nav.tweet.search', array('route'=>'tag.show','parameter' => $tag->id))
    @foreach($tweets as $tweet)
        <div class="row">
            <div class="media">
                <div class="media-left">
                    <img class="img-thumbnail media-object" src="{{ $tweet->user_avatar_url }}" alt="Avatar">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ '@' . $tweet->user_screen_name }}</h4>
                    <p>{{ $tweet->tweet_text }}</p>
                    <p>
                        {{\Twitter::linkTweet($tweet)}}
                    </p>
                    <p><a target="_blank" href="https://twitter.com/{{ $tweet->user_screen_name }}/status/{{ $tweet->id }}">
                            View on Twitter
                        </a></p>
                </div>
                <div>
                    <small>
                        {{$tweet->created_at}}
                    </small>
                </div>
            </div>
        </div>
    @endforeach
@stop