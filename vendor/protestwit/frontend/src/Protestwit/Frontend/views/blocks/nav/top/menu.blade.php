<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Groups <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    @foreach($groups as $group)
                    <li><a href="{{route('group.show',$group->slug)}}">{{$group->name}}</a></li>
                    @endforeach

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
<div class="row">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Protestwit</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Hot</a></li>
                    <li><a href="#about">New</a></li>
                    <li><a href="#contact">Top</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                @if(!\Auth::user())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a target="_blank" href="{{route('auth.twitter')}}">Login with Twitter</a></li>
                    </ul>
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a target="_blank" href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                @endif

            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>