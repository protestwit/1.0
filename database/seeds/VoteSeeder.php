<?php

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_votes = 10;

        $faker = Faker\Factory::create();

        \App\Vote::truncate();


        for ($x = 0; $x <= 10; $x++)
        {
            \App\Vote::create([
                'value' => $faker->numberBetween(999,999999),
                'user_id' => $faker->numberBetween(999,999999),
                'dispatch_id' => $faker->numberBetween(999,999999),
            ]);
        }
    }
}
