<?php

use App\User;
use App\Artist;
use App\Country;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TestArtistsTableSeeder extends Seeder
{
    function run()
    {
        DB::table('artists')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $countries */
        $countries = Country::all();

        /** @var Illuminate\Database\Eloquent\Collection $users */
        $users = User::all();

        for($b = 1; $b <= 20; $b++){
            Artist::create(array(
                'name' => 'Test Artist n°'.$b,
                'real_name' => (rand(0, 1) ? null : 'John Doe '.rand(1000, 9999)),
                'birthdate' => Carbon::createFromDate(rand(1900, ((int)date('Y'))-10), rand(1, 12), rand(1, 29)),
                'country_id' => $countries->random()->id,
                'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id enim ullamcorper metus rhoncus cursus. Donec dignissim eget mi ac mollis. Quisque commodo, massa vitae sagittis pulvinar, odio eros auctor.',
                'user_id' => $users->random()->id
            ));
        }
    }
}