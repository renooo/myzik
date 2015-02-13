<?php

use App\Country;
use Illuminate\Database\Seeder;

class TestsSeeder extends Seeder
{
    function run()
    {
        $this->call('DatabaseSeeder');
        $this->call('TestUsersTableSeeder');
        $this->call('TestBandsTableSeeder');
        $this->call('TestGenreBandTableSeeder');
        $this->call('TestArtistsTableSeeder');
        $this->call('TestArtistBandTableSeeder');
        $this->call('TestLabelsTableSeeder');
        $this->call('TestRecordsTableSeeder');
        $this->call('TestTracksTableSeeder');
    }
}
