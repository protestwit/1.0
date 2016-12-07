@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            @foreach($posts as $post)
                @if($post->dispatch)
                    @include('frontend::blocks.dispatch.votewidget',$post->dispatch)
                @endif
            <div class="post-preview">
                <a href="{{route('post.show',$post)}}">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{$post->post_excerpt}}
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
            </div>
            @endforeach
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts →</a>
                </li>
            </ul>
        </div>
    </div>
@stop
@section('right')
    @include('frontend::blocks.nav.group.rightmenu',['group' => $group])
@stop