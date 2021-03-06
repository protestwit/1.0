<?php

namespace App\Console\Commands;

use App\TwitterStreamFactory;
use Illuminate\Console\Command;
use App\TwitterStream;
use Protestwit\Group\Models\Group;

class ConnectGroupInstagramListeners extends Command
{
    
    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram_archive_instagrams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect all groups with an instagram listener';

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

        foreach(Group::all() as $group)
        {
            //Create two listeners, one for inbound hidden one for inbound public
            for ($i = 0; $i <= 1; $i++) {

                
                if($i == 0)
                {
                    $this->tracked[] = $group->public_tag;

                }else
                {
                    $this->tracked[] = $group->private_tag;
                }
                
            }
        }
        
        $this->twitterStream->setTrack($this->tracked);

        $this->twitterStream->consume();
        

    }
}
