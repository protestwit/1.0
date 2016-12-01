<?php namespace Protestwit\Tweet\Listeners;

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
        //Reset Tags Collection
        $this->tweet = $tweet;
        $this->tags = Tag::getModel()->newCollection();
        $this->groups = Group::getModel()->newCollection();
        
        //Build Tags From Tweet
        $text = $tweet->text;
//        \Log::info($text);
        $extractedTags = $this->extractTags($text);
//        \Log::info(print_r($extractedTags,true));

        foreach($extractedTags as $k => $v)
        {
            $tag = Tag::findOrCreate(['value' => strtolower($v)]);
            $this->tags->add($tag);

        }
        //Build User From Tweet
        $user_data_array = json_decode(json_encode($tweet->json->user),true);
        $user_data_array['twitter_id'] = $user_data_array['id_str'];
        unset($user_data_array['id']);
        
//        \Log::info(print_r($user_data_array,true));

        $this->user = User::findOrCreate($user_data_array);
        
        

        if ((int)$tweet->retweet_count > 20 && (int)$tweet->retweet_count < 50) {
            $this->user->follow();
            $this->tweet->retweet();
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
            $this->user->tags()->save($tag);

            foreach($this->groups as $group)
            {
                $group->tags()->save($tag);
            }
        }
        
        
        
        
        
        
        
        
        
//        Artisan::call('twitter_build_user_from_tweet', [
//            'tweet' => $this->argument('tweet'),
//        ]);
//
//        Artisan::call('twitter_follow_user', [
//            'user_id' => $tweet->user_id,
//        ]);
//
//        Artisan::call('twitter_build_tags_from_tweet', [
//            'tweet' => $this->argument('tweet'),
//        ]);
        
        
        
        
    }
}