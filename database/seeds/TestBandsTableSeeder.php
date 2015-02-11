<?php

use App\User;
use App\Band;
use App\Country;
use Illuminate\Database\Seeder;

class TestBandsTableSeeder extends Seeder
{
    function run()
    {
        DB::table('bands')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $countries */
        $countries = Country::all();

        /** @var Illuminate\Database\Eloquent\Collection $users */
        $users = User::all();

        for($b = 1; $b <= 20; $b++){
            Band::create(array(
                'name' => 'Test Band n°'.$b,
                'active' => rand(0, 1),
                'active_from' => ($min = rand(1950, date('Y'))),
                'active_to' => rand($min, date('Y')),
                'country_id' => $countries->random()->id,
                'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id enim ullamcorper metus rhoncus cursus. Donec dignissim eget mi ac mollis. Quisque commodo, massa vitae sagittis pulvinar, odio eros auctor.',
                'user_id' => $users->random()->id
            ));
        }
    }
}