<?php

namespace App\Console\Commands\Twitter;

use App\Tag;
use App\Tweet;
use App\TwitterStreamFactory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\TwitterStream;
use Protestwit\Group\Models\Group;

class ArchiveTweets extends Command
{
    
    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_archive_tweets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive all tweets that were not created today';

    protected $twitterStreamFactory;

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
//        $tag = Tag::create([
//            'value' => 'test',
//        ]);
//        
//        dd($tag->toArray());
//        
        
        $tags = Tag::where('value','=','test')->get();
        
        foreach($tags as $tag)
        {
            dd($tag->tweets->count());
        }
        
        
        
        
        $tweet = Tweet::create([
            'id' => 124512351,
            'json' => 1234,
            'tweet_text' => 'test',
            
        ]);

        $tag = Tag::create([
            'value' => 'test',
        ]);
        
        $tweet->tags()->save($tag);

        dd($tweet->tags->count());
        
        dd();
        
        
        $tweetsToArchive = Tweet::where('created_at','<',Carbon::now())->get();
        $tweetsToArchive->save();
        
//        foreach($tweetsToArchive as $archiveTweet)
//        {
//            $archiveTweet->archive();
//        }
    }
}
