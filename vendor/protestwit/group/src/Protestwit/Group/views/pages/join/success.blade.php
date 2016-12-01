@extends('group::layouts.default')
@section('content')

        <div class="page-header">
            <h1>You have Joined #{{$group->public_tag}} a subgroup of @todo parent</h1>
        </div>

    <div class="row">
        <ul>
            <li>
                <a href="@todo">Enable Private Twitter Notices</a>
            </li>
            <li>
                <a href="@todo">Enable Text Messaging</a>
            </li>
        </ul>

    </div>
    <div class="row well">
        <h3>How Can I Read Group Dispatches?</h3>
        <p>Follow <a href="https://twitter.com/search?q={{urlencode($group->public_tag)}}">#{{$group->public_tag}}</a> for public broadcasts</p>
        <p>
            <a href="@todo">Request Private Messages Through Twitter</a>
        </p>
        <p>Request SMS Messages</p>

    </div>
        <div class="row well">
            <h2>How do I send private dispatches?</h2>
            <div>
                <h3>Through Twitter</h3>
                <p>
                    <small>Step 1: Follow <a target="_blank" href="https://twitter.com/intent/follow?&screen_name=protestwit">@protestwit</a></small>
                    <div class="small">We will automatically follow you back allowing you to send and receive private messages</div>
                </p>
                <p>
                    <small>Step 2: Send us a <a href="@todo">private message</a> including the groups private tag #{{$group->private_tag}}</small>
                </p>
                <p>
                    We will send any messaged received directly to members of your group through all of their channels
                </p>
            </div>

        </div>
    <div class="row well">
        <h3>Latest Dispatches</h3>
    </div>
@stop