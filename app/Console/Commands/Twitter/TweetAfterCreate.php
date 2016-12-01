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

class TweetAfterCreate extends Command
{


    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_tweet_after_create {tweet}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Preform the actions needed in relation to twitter and the tweet id that is provided';

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


//        \Log::info('Handing Tweet After Create:' . $this->argument('tweet'));
//        \Log::info($this->argument('tweet'));
        $tweet = Tweet::where('id', '=', $this->argument('tweet'))->first();

        if ($tweet) {
            try {
                //Auto follow anyone whose tweet you capture
//                $this->info('Following: ' . $tweet->user_screen_name);
//                $this->info('Following: ' . $tweet->user_id);

                Artisan::call('twitter_build_user_from_tweet', [
                    'tweet' => $this->argument('tweet'),
                ]);

                Artisan::call('twitter_follow_user', [
                    'user_id' => $tweet->user_id,
                ]);

                Artisan::call('twitter_build_tags_from_tweet', [
                    'tweet' => $this->argument('tweet'),
                ]);

                //Foreach tag associated with the tweet check that there is a group associated with it,
                //If not create one



                
//                \Log::info('Tweet Tags Count:'. $tweet->tags->count());
//                \Log::info('Tweet Content:'. $tweet->content);
//                \Log::info(print_r($tweet->toArray(),true));
                if ($tweet->tags->count() > 0) {
                    foreach ($tweet->tags as $tag) {
                        \Log::info('Tag ' . $tag->id . ' has a count of ' . $tag->tweet->count);
                        if ($tag->tweets->count() > 1) {
                            \Log::info('Creating group for tag:' . $tag->value);

                            $existing_group = Group::where('public_tag', '=', $tag->value)->first();
                            if (!$existing_group) {
                                Group::create([
                                    'public_tag' => $tag->value,
                                    'private_tag' => null,
                                    'access_password' => null,
                                    'allow_public_subgroups' => 1,
                                    'is_public' => 1,

                                ]);
                            }
                        }
                    }
                }
                
                \Log::info('Retweet Count: ' . $tweet->retweet_count);
                $tweet = Tweet::where('id', '=', $this->argument('tweet'))->first();

                if ((int)$tweet->retweet_count > 40 && $tweet->retweet_count < 100) {
                    $existing_dispatch = Dispatch::where('content', '=', $tweet->text)->first();
                    if (!$existing_dispatch) {
                        \Log::info('Creating New Dispatch:');
                        $dispatch = Dispatch::create([
                            'content' => $tweet->text,
                            'tweet_id' => $tweet->id,
                        ]);

                        \Log::info('Associating Tags To Dispatch');
                        \Log::info(print_r($tweet->tags, true));

                        
                        if ($tweet->tags->count() > 0) {
                            echo $tweet->tags->count();
                            foreach ($tweet->tags as $tag) {
                                $dispatch->tags()->save($tag);

                            }
                        }
                        
                        Artisan::call('twitter_retweet', [
                            'tweet' => $this->argument('tweet'),
                        ]);
                    }
                }


            } catch (\Exception $e) {
                $this->info('Erorr: ' . $e->getMessage());
                dd($e->getMessage());

            }
        } else {
            \Log::info('Error finding tweet for twitter_tweet_after_create');
        }


    }
}