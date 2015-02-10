<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Band;
use App\Country;

class BandsTableSeeder extends Seeder
{
    function run()
    {
        Model::unguard();
        DB::table('bands')->delete();

        $country = Country::find('GB');

        $band = Band::create(array(
            'name' => 'Black Sabbath',
            'active' => true
        ));

        $band->country()->associate($country);
        $band->save();

        $band = Band::create(array(
            'name' => 'Pink Floyd',
            'active' => false
        ));

        $band->country()->associate($country);
        $band->save();
    }
}
