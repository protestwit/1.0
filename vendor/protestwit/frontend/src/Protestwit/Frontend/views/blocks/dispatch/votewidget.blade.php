@if(\Auth::user())
<div class="col-md-1" style="font-size: 30px; color:#606060; text-align: center;">
    <a href="{{route($upvote_route,$dispatch)}}">
        <span class="glyphicon glyphicon-triangle-top col-md-12"></span>
    </a>
    <span class="col-md-12">{{$dispatch->vote_count}}</span>
    <a href="{{route($upvote_route,$dispatch)}}">
    <span class="glyphicon glyphicon-triangle-bottom col-md-12"></span>
        </a>
</div>
    @else
    <div class="col-md-1" style="font-size: 30px; color:#606060; text-align: center;">
        <a href="@todo">
            <span class="glyphicon glyphicon-triangle-top col-md-12"></span>
        </a>
        <span class="col-md-12">{{$dispatch->vote_count}}</span>
        <a href="@todo">
            <span class="glyphicon glyphicon-triangle-bottom col-md-12"></span>
        </a>
    </div>
    @endif