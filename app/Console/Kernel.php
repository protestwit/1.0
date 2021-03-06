<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ConnectGroupTweetListeners::class,
        Commands\ConnectUserTweetListeners::class,
        Commands\BuildGroupsFromTags::class,
        Commands\TagAfterCreate::class,
        Commands\Twitter\ArchiveTweets::class,
        Commands\Twitter\TweetAfterCreate::class,
        Commands\Twitter\FollowUser::class,
        Commands\Twitter\BuildUserFromTweet::class,
        Commands\Twitter\BuildTagsFromTweet::class,
        Commands\Twitter\ReTweet::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}
