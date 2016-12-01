<?php

namespace App\Console\Commands;

use App\Tweet;
use App\TwitterStreamFactory;
use App\User;
use Illuminate\Console\Command;
use App\TwitterStream;
use Illuminate\Support\Facades\Artisan;
use Protestwit\Group\Models\Group;
use Thujohn\Twitter\Twitter;

class TagAfterCreate extends Command
{

    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_tag_after_create {tag}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle twitter actions after a new tag is created';

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

        \Log::info('twitter_tag_after_create' . $this->argument('tag'));

    }
}
   