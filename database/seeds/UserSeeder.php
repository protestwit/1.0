<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_created_users = 240;

        $faker = Faker\Factory::create();

        \App\User::truncate();

        $admin_user = User::create([
            'email' => 'admin@localhost.com',
            'password' => 'password',
            'name' => 'admin',
            'remember_token' => null,
        ]);
        

        for ($i = 1; $i <= $num_created_users; $i++) {
            User::create([
                'email' => $faker->email,
                'password' => 'password',
                'name' => $faker->name,
                'remember_token' => null,
            ]);
        }
    }
}
