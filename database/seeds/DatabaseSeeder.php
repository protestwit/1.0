<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
        $this->call(GroupSeeder::class);
////         $this->call(DispatchSeeder::class);
//               
//         $this->call(TweetSeeder::class);
//         $this->call(PostSeeder::class);
//
//         $this->call(ImageSeeder::class);
//         $this->call(EventSeeder::class);
//        
//         $this->call(CommentSeeder::class);
//         $this->call(TagSeeder::class);
//         $this->call(TweetSeeder::class);
//         $this->call(VoteSeeder::class);
//        
//        $this->call(TaskSeeder::class);
//        $this->call(BoycottSeeder::class);
    }
}
