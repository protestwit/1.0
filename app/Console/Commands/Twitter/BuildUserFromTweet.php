<?php

namespace App\Console\Commands\Twitter;

use App\Tweet;
use App\TwitterStreamFactory;
use App\User;
use Illuminate\Console\Command;
use App\TwitterStream;
use Illuminate\Support\Facades\Artisan;
use Protestwit\Group\Models\Group;
use Thujohn\Twitter\Twitter;

class BuildUserFromTweet extends Command
{

    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_build_user_from_tweet {tweet}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Take a tweet id and create a user object from the tweet';

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

        \Log::info('Creating User From Tweet:' . $this->argument('tweet'));
        \Log::info($this->argument('tweet'));
        $tweet = Tweet::where('id', '=', $this->argument('tweet'))->first();

        if ($tweet) {
            
            $existing_user = User::where('twitter_id', '=', $tweet->user_id)->first();

            if (!isset($existing_user)) {
                \Log::info('not an existing user');
                $user_data = $tweet->user;
                
                \Log::info(print_r($user_data,true));

                try {
                    $user = User::create([
                        'twitter_id' => $user_data->id_str,
                        'name' => isset($user_data->name) ? $user_data->name : null,
                        'screen_name' => isset($user_data->screen_name) ? $user_data->screen_name : null,
                        'location' => isset($user_data->location) ? $user_data->location : null,
                        'profile_location' => isset($user_data->profile_location) ? $user_data->utc_offset : null,
                        'description' => isset($user_data->description) ? $user_data->description : null,
                        'url' => isset($user_data->url) ? $user_data->url : null,
                        'follower_count' => isset($user_data->follower_count) ? $user_data->follower_count : 0,
                        'friends_count' => isset($user_data->friends_count) ? $user_data->friends_count : 0,
                        'listed_count' => isset($user_data->listed_count) ? $user_data->listed_count : 0,
                        'favourites_count' => isset($user_data->favourites_count) ? $user_data->favourites_count : 0,
                        'utc_offset' => isset($user_data->utc_offset) ? $user_data->utc_offset : null,
                        'time_zone' => isset($user_data->time_zone) ? $user_data->time_zone : null,
                        'geo_enabled' => isset($user_data->geo_enabled) ? $user_data->geo_enabled : 0,
                        'statuses_count' => isset($user_data->statuses_count) ? $user_data->statuses_count : 0,
                        'lang' => isset($user_data->lang) ? $user_data->lang : null,

                    ]);
                } catch (\Exception $e) {
                    $this->info('Error in twitter_create_user_from_tweet');
                    \Log::info('Error in twitter_create_user_from_tweet '. $e->getMessage());
                }
            } else {
                $this->info('User already exists');

                \Log::info('User already exists');
            }


        } else {

        }


    }
}
   