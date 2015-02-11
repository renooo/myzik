<?php

use App\User;
use App\Label;
use App\Country;
use Illuminate\Database\Seeder;

class TestLabelsTableSeeder extends Seeder
{
    function run()
    {
        DB::table('labels')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $countries */
        $countries = Country::all();

        /** @var Illuminate\Database\Eloquent\Collection $users */
        $users = User::all();

        for($l = 1; $l <= 10; $l++){
            Label::create(array(
                'name' => 'Test Label n°'.$l,
                'country_id' => $countries->random()->id,
                'user_id' => $users->random()->id
            ));
        }
    }
}