<?php

namespace App\Console\Commands;

use App\Tag;
use App\TwitterStreamFactory;
use Illuminate\Console\Command;
use App\TwitterStream;
use Protestwit\Group\Models\Group;

class BuildGroupsFromTags extends Command
{
    protected $tags;
    protected $groups;
    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build_groups_from_tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create groups from tags that meet minimum criteria';

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
        $tagsCollection = Tag::all();
        foreach($tagsCollection as $tag)
        {
            dd($tag->tweets->toArray());
            if(!$tag->tweets->count() > 0)
            {
                $tag->delete();
                break;
            }
            
            
            if(!$tag->group)
            {
                $existing_group = Group::where('public_tag','=',$tag->value)->first();
                if(!$existing_group)
                {
                    
                    
                    
                }


            }
        }

        

    }
}
