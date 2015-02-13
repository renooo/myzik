<?php

use App\Country;
use Illuminate\Database\Seeder;

class TestsEmptySeeder extends Seeder
{
    function run()
    {
        DB::table('users')->truncate();
        DB::table('bands')->truncate();
        DB::table('artists')->truncate();
        DB::table('records')->truncate();
        DB::table('tracks')->truncate();
        DB::table('artist_band')->truncate();
        DB::table('labels')->truncate();
        DB::table('band_genre')->truncate();
    }
}
