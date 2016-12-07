<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_comments = 10;

        $faker = Faker\Factory::create();

        \App\Comment::truncate();


        for ($x = 0; $x <= 10; $x++)
        {
            \App\Comment::create([
                'content' => $faker->sentence(),
            ]);
        }
    }
}
