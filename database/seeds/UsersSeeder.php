<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->name  	= 'Cristian Galeano';
        $user->email 	= 'cristian.galeano19132@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();


    }
}
