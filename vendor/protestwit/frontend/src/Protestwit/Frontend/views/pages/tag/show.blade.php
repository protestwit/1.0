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
                    <div><a target="_blank" href="{{route('tweet.show',$tweet->id)}}">Tweet Data</a></div>
                </div>

                <div class="media-body">
                    <h4 class="media-heading">{{ '@' . $tweet->user_screen_name }} , {{ $tweet->author_location }}</h4>
                    <p>{!!\Linkify::process($tweet->author_description)!!}</p>
                    <p>Followers: {{$tweet->author_followers_count}}  Friends: {{$tweet->author_friends_count}} Tweets: {{$tweet->author_listed_count}}  Favourites: {{$tweet->author_favourites_count}}</p>
                    <p>
                        {!!\Linkify::process($tweet->tweet_text)!!}
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