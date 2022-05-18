<?php

namespace Database\Seeders;

use App\Models\ParentUser;
use Faker\Factory;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentUserSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about ParentUser, we are given the below data like  id, name, email, phone_number, password, address, gender, pan_card and is_approved.
     * After we Run the database ParentUserSeeder.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $parent = new ParentUser();
        $parent->name = $faker->firstName;
        $parent->email = $faker->email;
        $parent->phone_number = $faker->phoneNumber;
        $parent->password = Hash::make($faker->password);
        $parent->address = $faker->address;
        $parent->pan_card = $faker->regexify('/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/');
        $parent->gender = ['Male', 'Female'][rand(0, 1)];
        $parent->is_approved=['approved','not_approved'][rand(0,1)];
        $parent->save();

    }
}
