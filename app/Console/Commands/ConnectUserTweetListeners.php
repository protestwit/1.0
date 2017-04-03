<?php

namespace App\Console\Commands;

use App\TwitterStreamFactory;
use App\User;
use Illuminate\Console\Command;
use App\TwitterStream;
use Protestwit\Group\Models\Group;

class ConnectUserTweetListeners extends Command
{
    
    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect_user_tweet_listeners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect all users with a tweet listener via twitter streaming api';

    protected $twitterStreamFactory;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TwitterStreamFactory $factory)
    {
        $this->twitterStream = $factory->create();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $streams = [];

        $this->twitterStream->consumerKey = env('TWITTER_CONSUMER_KEY');
        $this->twitterStream->consumerSecret = env('TWITTER_CONSUMER_SECRET');

        foreach(User::popular()->get() as $user)
        {
            if (isset($user->twitter_id)) {
                $this->tracked[] = $user->twitter_id;
            }
        }
        
        $this->twitterStream->setFollow($this->tracked);

        $this->twitterStream->consume();
        

    }
}
