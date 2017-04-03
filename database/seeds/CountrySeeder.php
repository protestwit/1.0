<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
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

        $countries = config('geography.countries');

        foreach($countries as $k)
        {
            $country_data = [
                'name' => $k->name,
                'code' => $k->code,
            ];

            $country = \App\Country::getModel()->findOrCreate($country_data);
            if($country->code && isset($k->states))
            {
                foreach($k->states as $state)
                {
                    $state = \App\State::getModel()->findOrCreate(['code' => $state->code]);
                    $state->country = $country;
                    $state->save();
                    $country->states()->save($state);

                }
            }



        }
    }
}
