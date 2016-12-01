<?php

namespace App\Console\Commands\Twitter;

use App\Tag;
use App\Tweet;
use App\TwitterStreamFactory;
use App\User;
use Illuminate\Console\Command;
use App\TwitterStream;
use Illuminate\Support\Facades\Artisan;
use Protestwit\Group\Models\Group;
use Thujohn\Twitter\Twitter;

class BuildTagsFromTweet extends Command
{

    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_build_tags_from_tweet {tweet}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Take a tweet extract all hashed tags from it and relate them to the tweet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TwitterStreamFactory $factory)
    {
        parent::__construct();
    }


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
    
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        \Log::info('Creating Tags From Tweet:' . $this->argument('tweet'));
        \Log::info($this->argument('tweet'));
        $tweet = Tweet::where('id', '=', $this->argument('tweet'))->first();


        if ($tweet) {
            $text = $tweet->text;
            $extractedTags = $this->extractTags($text);

            foreach($extractedTags as $k => $v)
            {                  
                $existingTag = Tag::where('value','=',strtolower($v))->first();
                if(!$existingTag)
                {
                    $newTag = Tag::create([
                        'value' => strtolower($v),
                    ]);

                    $tweet->tags()->attach($newTag->id);
                }
                else{
                    //The tag already exists, tie it to the tweet
                    $tweet->tags()->attach($existingTag->id);
                }
            }

        } else {
            
        }


    }
}
   