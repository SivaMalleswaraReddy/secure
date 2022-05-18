<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Faker\Factory;
class AdminSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about Admin, we are given the below data like  id, name, email, phone_number, password, address, dob, and joined_date.
     *After we Run the database AdminSeeder.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $admin = new admin();
        $admin->name = $faker->firstName;
        $admin->email = $faker->email;
        $admin->phone_number = $faker->phoneNumber;
        $admin->password = $faker->password;
        $admin->address = $faker-> address;
        $admin->dob= $faker->date();
        $admin->joined_date=$faker->date;
        $admin->save();
    }
}
