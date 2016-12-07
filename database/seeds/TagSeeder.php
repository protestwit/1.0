<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_tags = 10;

        $faker = Faker\Factory::create();
        
        for ($x = 0; $x <= 10; $x++)
        {
            \App\Tag::create([
                'value' => $faker->word,
            ]);
        }
    }
}
