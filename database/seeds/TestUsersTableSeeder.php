<?php

use App\User;
use Illuminate\Database\Seeder;

class TestUsersTableSeeder extends Seeder
{
    function run()
    {
        DB::table('users')->truncate();

        for($u = 1; $u <= 10; $u++){
            User::create(array(
                'name' => 'user'.$u,
                'password' => bcrypt('password'),
                'email' => 'user'.$u.'@example.com'
            ));
        }
    }
}
