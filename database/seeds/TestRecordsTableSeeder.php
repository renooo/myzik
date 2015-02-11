<?php

use App\User;
use App\Band;
use App\Format;
use App\Record;
use App\Label;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TestRecordsTableSeeder extends Seeder
{
    function run()
    {
        DB::table('records')->truncate();

        /** @var Illuminate\Database\Eloquent\Collection $bands */
        $bands = Band::all();

        /** @var Illuminate\Database\Eloquent\Collection $labels */
        $labels = Label::all();

        /** @var Illuminate\Database\Eloquent\Collection $formats */
        $formats = Format::all();

        /** @var Illuminate\Database\Eloquent\Collection $users */
        $users = User::all();

        for($r = 1; $r <= 50; $r++){
            Record::create(array(
                'name' => 'Test Record n°'.$r,
                'release_date' => Carbon::createFromDate(rand(1900, date('Y')), rand(1, 12), rand(1, 29)),
                'catalog_number' => uniqid().'-'.uniqid(),
                'band_id' => $bands->random()->id,
                'label_id' => (rand(0, 1) ? null : $labels->random()->id),
                'format_id' => $formats->random()->id,
                'user_id' => $users->random()->id
            ));
        }
    }
}