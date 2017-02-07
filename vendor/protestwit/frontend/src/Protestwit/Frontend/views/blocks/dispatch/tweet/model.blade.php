
<div class="row">
    <div class="col-xs-2"><a target="_blank" href="{{$dispatch->author_profile_url}}"><img src="{{$dispatch->author_profile_image_url}}"/></a></div>
    <div class="col-xs-10">

            <a href="{{$dispatch->author_profile_url}}">{{$dispatch->author_name}}</a> <a href="{{$dispatch->author_profile_url}}">{{'@'.$dispatch->author_handle}}</a>


                    <span>
            {{$dispatch->content}}
                    </span>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">Retweets: {{$dispatch->vote_count}}</div>
    <div class="col-xs-4">hotness: {{$dispatch->hotness}}</div>
    <div class="col-xs-4"><a target="_blank" href="{{$dispatch->external_url}}">View Tweet</a></div>
</div>
<hr/>