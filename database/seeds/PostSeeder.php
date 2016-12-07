<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_posts = 10;

        $faker = Faker\Factory::create();

        \App\Post::truncate();


        for ($x = 0; $x <= $num_created_posts; $x++)
        {
            \App\Post::create([
                'post_author' => $faker->name,
                'post_date' =>  $faker->dateTime,
                'post_date_gmt' => '',
                'post_content' => $faker->sentence() .'#nodapl' . '#waterislife',
                'post_title' => $faker->sentence(),
                'post_excerpt' => $faker->sentence(),
                'post_status' => 'publish',
                'post_type' => 'post',
                'ping_status' => 'publish',
                'post_name' => 'publish',
            ]);
        }
        
        
        
        
        
        
        
    }
}
