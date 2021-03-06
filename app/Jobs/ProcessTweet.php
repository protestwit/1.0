<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Tweet;

class ProcessTweet extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $tweet;
    protected $track;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tweet, $track = null)
    {

        $this->tweet = $tweet;
        $this->track = $track;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tweet = json_decode($this->tweet, true);


        //if we have a retweeted status then use that as the tweet
        if(isset($tweet['retweeted_status']))
        {
            $tweet = $tweet['retweeted_status'];
            $this->tweet = json_encode($tweet);
            $tweet_data = $tweet;
            $tweet_data['id'] = $tweet_data['id_str'];
        }else{
            $tweet_data = json_decode($this->tweet, true);
            $tweet_data['id'] = $tweet_data['id_str'];
        }
        

        if(isset($tweet))
        $tweet_text = isset($tweet['text']) ? $tweet['text'] : '';

        if (isset($this->track)) {
            foreach ($this->track as $k => $possible_tag) {

                if (stripos($tweet_text, $possible_tag) !== false) {


                    $user_id = isset($tweet['user']['id_str']) ? $tweet['user']['id_str'] : null;
                    $user_screen_name = isset($tweet['user']['screen_name']) ? $tweet['user']['screen_name'] : null;
                    $user_avatar_url = isset($tweet['user']['profile_image_url_https']) ? $tweet['user']['profile_image_url_https'] : null;
                    if (isset($tweet['id'])) {

                        $data = array_merge(
                            ['id' => $tweet['id_str'],
                                'json' => $this->tweet,
                                'tweet_text' => $tweet_text,
                                'user_id' => $user_id,
                                'user_screen_name' => $user_screen_name,
                                'user_avatar_url' => $user_avatar_url,
                                'retweet_count' => isset($tweet['retweeted_status']) && isset($tweet['retweeted_status']['retweet_count']) ? $tweet['retweeted_status']['retweet_count'] : $tweet['retweet_count'] ,
                            ], $tweet_data);
                        


                        Tweet::create($data);
                    }


                } else {
                    //If there was no tracked set
//                    $user_id = isset($tweet['user']['id_str']) ? $tweet['user']['id_str'] : null;
//                    $user_screen_name = isset($tweet['user']['screen_name']) ? $tweet['user']['screen_name'] : null;
//                    $user_avatar_url = isset($tweet['user']['profile_image_url_https']) ? $tweet['user']['profile_image_url_https'] : null;
//
//                    if (isset($tweet['id'])) {
//                        Tweet::create([
//                            'id' => $tweet['id_str'],
//                            'json' => $this->tweet,
//                            'tweet_text' => $tweet_text,
//                            'user_id' => $user_id,
//                            'user_screen_name' => $user_screen_name,
//                            'user_avatar_url' => $user_avatar_url,
//                            'approved' => 0
//                        ]);
//                    }
                }
            }
        }
    }
    
    
    
    
    
    
}