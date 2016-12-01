@extends('group::layouts.default')
@section('content')
<div class="container">
    <div class="page-header">
        <h1>Join #{{$group->public_tag}}</h1>
        <h1>Join #{{$group->access_password}}</h1>
    </div>
</div>
<div class="well">
    {{ Form::open(array('route' => ['group.join.store',$group], 'method' => 'post')) }}
    <div class="row">
        <div class="col-md-12">
            <h3>This Group is Invite Only</h3>
            <small>
                Your group organizer will provide you with your access password
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-control">
                    <label class="">Access Password</label>
                    <input type="password"/>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop