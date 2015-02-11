<?php

use App\Format;
use Illuminate\Database\Seeder;

class FormatsTableSeeder extends Seeder
{
    function run()
    {
        DB::table('formats')->truncate();

        $formats = array(
            'CD',
            'Vinyle',
            'Cassette'
        );

        foreach($formats as $format){
            Format::create(array('name' => $format));
        }
    }
}
