<?php

namespace App\Events\Twitter;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewTweet extends Event implements ShouldBroadcast
{

    public $groupId;
    public $tweetId;


    public function __construct($groupId = null, $tweetId = null)
    {
      $this->groupId = $groupId;
        $this->tweetId = $tweetId;
    }

    public function broadcastOn()
    {
        return ['tweet-channel'];

    }
}
