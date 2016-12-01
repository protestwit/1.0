<?php

namespace App;

use OauthPhirehose;
use App\Jobs\ProcessTweet;
use Illuminate\Foundation\Bus\DispatchesJobs;

class TwitterStreamFactory 
{

    public function create()
    {
        $twitter_access_token = env('TWITTER_ACCESS_TOKEN', null);
        $twitter_access_token_secret = env('TWITTER_ACCESS_TOKEN_SECRET', null);
        return new TwitterStream($twitter_access_token, $twitter_access_token_secret, \Phirehose::METHOD_FILTER);
    }
    
}
