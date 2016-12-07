
    <div class="row profile">
        <div class="col-md-12">
            <div class="group-sidebar">
                <br>
                    <h1>{{$group->name}}</h1>
                <div class="btn-group group-userbuttons">
                    <a href="{{route('post.create')}}">
                        <span class="btn btn-primary btn-sm">Create Post</span>
                    </a>
                </div>
                <div class="btn-group group-userbuttons">
                    <span  class="btn btn-primary btn-sm">Create Link</span>
                </div>
                <div class="btn-group group-userbuttons">
                    <span class="btn btn-primary btn-sm">Create Event</span>
                </div>
                <div class="group-menu">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{route('group.show',$group)}}">
                                <i class="glyphicon glyphicon-home"></i>
                                Dispatches</a>
                        </li>
                        <li>
                            <a href="{{route('posts.index',$group)}}">
                                <i class="glyphicon glyphicon-user"></i>
                                Posts </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Images </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Events </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
    </div>
