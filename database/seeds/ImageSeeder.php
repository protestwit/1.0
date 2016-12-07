<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_images = 10;

        $faker = Faker\Factory::create();

        \App\Image::truncate();


        for ($x = 0; $x <= $num_created_images; $x++)
        {
            \App\Image::create([
                'url' => $faker->imageUrl(),
            ]);
        }
    }
}
