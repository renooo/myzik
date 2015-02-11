<?php

use App\Record;
use App\Track;
use Illuminate\Database\Seeder;

class TestTracksTableSeeder extends Seeder
{
    function run()
    {
        DB::table('tracks')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $records */
        $records = Record::all();

        foreach($records as $record){
            for($t = 1; $t <= rand(1, 20); $t++){
                Track::create(array(
                    'number' => $t,
                    'name' => str_random().' '.str_random().' '.str_random(),
                    'duration' => rand(2, 180),
                    'record_id' => $record->id
                ));
            }
        }
    }
}