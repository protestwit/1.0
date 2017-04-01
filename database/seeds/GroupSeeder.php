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
                'slug' => 'nodapl',
                'public_tag' => 'nodapl',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'Water Is Life',
                'slug' => 'waterislife',
                'public_tag' => 'wil',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],

            [
                'name' => 'Stop Kinder Morgan',
                'slug' => 'km',
                'public_tag' => 'kindermorgan',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'Lancaster Pipeline',
                'slug' => 'lancasterstand',
                'public_tag' => 'lancasterstand',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'Antifa',
                'slug' => 'antifa',
                'public_tag' => 'antifa',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
            'name' => 'Protest',
            'slug' => 'protest',
            'public_tag' => 'protest',
            'private_tag' => null,
            'access_password' => null,
            'allow_public_subgroups' => 1,
            'is_public' => 1,
        ],
            [
                'name' => 'flintwater',
                'slug' => 'flintwater',
                'public_tag' => 'flintwater',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
            'name' => 'donnabrazile',
            'slug' => 'donnabrazile',
            'public_tag' => 'donna brazile',
            'private_tag' => null,
            'access_password' => null,
            'allow_public_subgroups' => 1,
            'is_public' => 1,
        ],
            [
                'name' => 'trump',
                'slug' => 'trump',
                'public_tag' => 'trump',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'AnonyOps',
                'slug' => 'AnonyOps',
                'public_tag' => 'AnonyOps',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'TheYoungTurks',
                'slug' => 'TheYoungTurks',
                'public_tag' => 'TheYoungTurks',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
            [
                'name' => 'UR_Ninja',
                'slug' => 'UR_Ninja',
                'public_tag' => 'UR_Ninja',
                'private_tag' => null,
                'access_password' => null,
                'allow_public_subgroups' => 1,
                'is_public' => 1,
            ],
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
