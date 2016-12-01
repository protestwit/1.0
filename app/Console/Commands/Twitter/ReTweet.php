<?php

namespace App\Console\Commands\Twitter;

use App\Dispatch;
use App\Tweet;
use App\TwitterStreamFactory;
use Illuminate\Console\Command;
use App\TwitterStream;
use Illuminate\Support\Facades\Artisan;
use Protestwit\Group\Models\Group;
use Thujohn\Twitter\Twitter;

class ReTweet extends Command
{

    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_retweet {tweet}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'retweet a tweet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            //Retweet the passed tweet
            \Log::info('Retweeting tweet'. $this->argument('tweet'));
            
            \Twitter::postRt($this->argument('tweet'));


        }catch(\Exception $e)
        {
            $this->info('Erorr: '. $e->getMessage());
        }


    }
}
