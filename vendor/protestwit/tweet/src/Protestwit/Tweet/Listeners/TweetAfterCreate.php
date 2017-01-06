<?php namespace Protestwit\Tweet\Listeners;

use App\Dispatch;
use App\Tag;
use App\Tweet;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Protestwit\Group\Models\Group;

class TweetAfterCreate
{

    protected $tags;
    protected $user;
    protected $tweet;
    protected $groups;

    public function extractTags($string = '')
    {
        $return = [];
        preg_match_all("/(#\w+)/", $string, $matches);
        foreach($matches as $k => $v)
        {
            $return[] = str_replace('#','',$v);
        }
        if(isset($return[0])) return $return[0];
        return [];
    }
    

    public function handle(Tweet $tweet)
    {
        \Log::info('Tweet After Create ' . $tweet->id);
        //Reset Tags Collection
        $this->tweet = $tweet;
        $this->tags = Tag::getModel()->newCollection();
        $this->groups = Group::getModel()->newCollection();
        
        //Build Tags From Tweet
        $text = $tweet->text;
        $extractedTags = $this->extractTags($text);

        foreach($extractedTags as $k => $v)
        {
            $tag = Tag::findOrCreate(['value' => strtolower($v)]);
            $this->tags->add($tag);

        }
        //Build User From Tweet

        //Handles fresh tweets
        if (isset($tweet->json) && isset($tweet->json->user)) {
            \Log::info('User Case 1');
            $user_data_array = json_decode($tweet->json->user, true);
            $user_data_array['twitter_id'] = $user_data_array['id'];
            unset($user_data_array['id']);
            $this->user = User::findOrCreate($user_data_array);
        } elseif (isset($tweet->json)) {
            \Log::info('User Case 2');
            $user_data_array = json_decode($tweet->json, true);
            
//            \Log::info(print_r($user_data_array,true));
            if (isset($user_data_array['user']) && isset($user_data_array['user']['id'])) {
                //Trade the id for twitter_id
                $user_data_array['user']['twitter_id'] = $user_data_array['user']['id'];
                unset($user_data_array['user']['id']);

                \Log::info('Find or create user');
                $this->user = User::findOrCreate($user_data_array['user']);
            }
        }



        \Log::info('Retweet Count: ' .$tweet->retweet_count);
        if ((int)$tweet->retweet_count > 10 &&(int)$tweet->retweet_count < 5000) {

            \Log::info('Creating Dispatch From Tweet '. $tweet->id);
            $dispatch = Dispatch::updateOrCreate([
                'tweet_id' => $tweet->id,
                'tweet' => $tweet,
                'retweet_count' => $tweet->content,
            ]);

            $dispatch->tweet()->save($tweet);

            if (isset($this->user)) {
//                $this->user->follow();
            }
            if (isset($this->tweet)) {
//                $this->tweet->retweet();
            }
        }
        
        //Build a list of groups from the tags
        foreach ($this->tags as $tag) {
            $groups = Group::where('public_tag','=',$tag->value)->orWhere('private_tag','=',$tag->value)->get();
            foreach($groups as $group)
            {
                $this->groups->add($group);
            }
        }


        
        foreach($this->tags as $tag)
        {
            $this->tweet->tags()->save($tag);
        } 
        
    }
}