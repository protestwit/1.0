
<style>
    .dropdown.dropdown-lg .dropdown-menu {
        margin-top: -1px;
        padding: 6px 20px;
    }
    .input-group-btn .btn-group {
        display: flex !important;
    }
    .btn-group .btn {
        border-radius: 0;
        margin-left: -1px;
    }
    .btn-group .btn:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .btn-group .form-horizontal .btn[type="submit"] {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .form-horizontal .form-group {
        margin-left: 0;
        margin-right: 0;
    }
    .form-group .form-control:last-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    @media screen and (min-width: 768px) {
        #adv-search {
            width: 500px;
            margin: 0 auto;
        }
        .dropdown.dropdown-lg {
            position: static !important;
        }
        .dropdown.dropdown-lg .dropdown-menu {
            min-width: 500px;
        }
    }
</style>
{{Form::open(['route' => [$route,$parameter], 'method' => 'GET'])}}
<div class="row">
    <nav class="navbar">
        <div class="container">
            <div id="tweet-search">
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group" id="adv-search">
                            <input name="json" type="text" class="form-control" placeholder="Search Tweets" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">

                                                <div class="form-group">
                                                    <label for="filter">Filter by</label>
                                                    <select name="order_by" class="form-control">
                                                        <option value="" selected>All Tweets</option>
                                                        <option value="retweet_count">Hot</option>
                                                        <option value="date_created">New</option>
                                                        <option value="retweet_count">Retweets</option>
                                                        <option value="mostCommented">Most commented</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-1">@</div>
                                                    <div class="col-xs-11"><input class="form-control" placeholder="Author Twitter Handle" type="text" name="user_screen_name" /></div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" />
                                                </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
{{Form::close()}}