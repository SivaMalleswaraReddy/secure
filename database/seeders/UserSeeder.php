<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about User, we are given the below data like  id, name, email, and password.
     * After we Run the database UserSeeder.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'shiva',
            'email' => 'shiva@gmail.com',
            'password' => Hash::make('12345')
        ]);
    }
}
