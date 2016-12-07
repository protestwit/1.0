<?php

use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_tweets = 100;

        $faker = Faker\Factory::create();

        \App\Tweet::truncate();


        for ($x = 0; $x <= 10; $x++)
        {
            \App\Tweet::create([
                'id' => $faker->numberBetween(999,999999),
                'json' => json_encode([]),
                'tweet_text' => $faker->sentence(),
                'user_id' => $faker->numberBetween(999,99999),
                'user_screen_name' => $faker->word . $faker->numberBetween(1,99),
                'user_avatar_url' => $faker->imageUrl(),
                'retweet_count' => $faker->numberBetween(0,30)
            ]);
        }
    }
}
