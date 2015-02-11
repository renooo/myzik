<?php

use App\Band;
use App\Genre;
use Illuminate\Database\Seeder;

class TestGenreBandTableSeeder extends Seeder
{
    function run()
    {
        DB::table('band_genre')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $bands */
        $bands = Band::all();

        /** @var Illuminate\Database\Eloquent\Collection $genres */
        $genres = Genre::all();

        foreach($bands as $band){
            foreach($genres->random(rand(1, 3)) as $genre){
                $band->genres()->attach($genre);
            }
        }
    }
}
