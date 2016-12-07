<?php

use Illuminate\Database\Seeder;

class DispatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Factory();
        $num_created_dispatches = 10;

        $faker = Faker\Factory::create();

        \App\Dispatch::truncate();
    }
}
