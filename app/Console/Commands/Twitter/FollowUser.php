<?php

namespace App\Console\Commands\Twitter;

use App\Tweet;
use App\TwitterStreamFactory;
use Illuminate\Console\Command;
use App\TwitterStream;
use Protestwit\Group\Models\Group;
use \Protestwit\Twitter\Facades\Twitter;

class FollowUser extends Command
{
    
    protected $tracked;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter_follow_user {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'follow twitter user passing the user id';
    

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
            try{
            //Auto follow anyone whose tweet you capture
             \Log::info('Following Twitter User Id: '. $this->argument('user_id'));
                $data = [
                    'user_id' => $this->argument('user_id') ,
                ];

                Twitter::postFollow($data);
                

            }catch(\Exception $e)
            {
                $this->info('Erorr: '. $e->getMessage());
            }
    }
}
