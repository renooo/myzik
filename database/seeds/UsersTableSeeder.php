<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    function run()
    {
        DB::table('users')->truncate();

        $users = array(
            array('name' => 'renaud.bougre', 'password' => bcrypt('password'), 'email' => 'renaud.bougre@gmail.com'),
            array('name' => 'dale.cooper', 'password' => bcrypt('password'), 'email' => 'dale.cooper@twin-peaks.net')
        );

        foreach($users as $user){
            User::create($user);
        }
    }
}
