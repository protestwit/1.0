@extends('frontend::layouts.2col-right')
@section('title')
    ProtestWit - Organizing Social Movements, Social Media Matters
@stop

@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop
@section('content')
    {{ $vue->getViewName() }}
    <component is="{{ $vue->getViewName() }}">
    <ul class="stream">
        @foreach($dispatches as $dispatch)
            <dispatch :name="dispatch_{{$dispatch->id}}" :model="{{json_encode($dispatch->toArray())}}" inline-template>
                <div class="stream-item">
                    @if($dispatch->isTweet())
                        @include('frontend::blocks.dispatch.tweet.model')
                    @elseif($dispatch->isPost())
                        post
                    @elseif($dispatch->isLink())
                        link
                    @elseif($dispatch->isEvent())
                        event
                    @endif
                </div>
            </dispatch>
        @endforeach
    </ul>
    <div class="paginator">
        {{$dispatches->links()}}
    </div>
    </component>
@stop
