<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class TestBasicSeeder extends Seeder
{
    function run()
    {
        Model::unguard();

        for($u = 1; $u <= 3; $u++) {
            $user = \App\User::create(['name' => 'user'.$u, 'email' => 'user'.$u.'@test.com', 'password' => 'password']);
            $band = \App\Band::create(['name' => 'test band '.$u, 'user_id' => $user->id]);
        }
    }
}