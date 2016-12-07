@if(isset($subject) && isset($route))
@if(isset($subject->comments))
    <a href="{{route($route,$subject)}}">
        {{$subject->comments->count()}} comments
    </a>
    @else
    <a href="{{route($route,$subject)}}">
        0 comments
    </a>
@endif
@endif
