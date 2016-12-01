<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_created_parent_groups = 10;

        $faker = Faker\Factory::create();

        \Protestwit\Group\Models\Group::truncate();

        $groups = [
            [
                'name' => 'No Dakota Access Pipeline',
                'slug' => 'north-dakota-access-pipeline',
                'public_tag' => 'nodapl',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'Water Is Life',
                'slug' => 'waterislife',
                'public_tag' => 'water-is-life',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],

            [
                'name' => 'Stop Kinder Morgan',
                'slug' => 'kinder-morgan-pipeline',
                'public_tag' => 'kindermorgan',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ]
        ];
        
        
        
        
        
        
        
        
        foreach($groups as $group) {
            \Protestwit\Group\Models\Group::create([
                'name' => $group['name'],
                'slug' => $group['slug'],
                'public_tag' => $group['public_tag'],
                'private_tag' => $group['private_tag'],
                'access_password' => $group['access_password'],
                'allow_public_subgroups' => $group['allow_public_subgroups'],
                'is_public' => $group['is_public'],
            ]);
        }
    }
}
