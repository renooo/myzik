<?php

use App\Band;
use App\Artist;
use Illuminate\Database\Seeder;

class TestArtistBandTableSeeder extends Seeder
{
    function run()
    {
        DB::table('artist_band')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $bands */
        $bands = Band::all();

        /** @var Illuminate\Database\Eloquent\Collection $artists */
        $artists = Artist::all();

        foreach($artists as $artist){
            foreach($bands->random(rand(1, 3)) as $band){
                $artist->bands()->attach($band);
            }
        }
    }
}
