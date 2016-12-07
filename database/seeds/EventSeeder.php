<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_events = 10;

        $faker = Faker\Factory::create();

        \App\Event::truncate();


        for ($x = 0; $x <= $num_created_events; $x++)
        {
            \App\Event::create([
                'name' => $faker->name,
                'description' => $faker->sentence(),
            ]);
        }
    }
}
