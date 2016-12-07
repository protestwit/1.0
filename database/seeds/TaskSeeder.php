<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_created_tasks = 10;

        $faker = Faker\Factory::create();

        \App\Task::truncate();
        for ($x = 0; $x <= 10; $x++)
        {
            $faker = Faker\Factory::create();
            
            \App\Task::create([
                'body' => $faker->paragraph,
                'completed' => $faker->numberBetween(0,1)
            ]);
        }

        
   
    }
}
