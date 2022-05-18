<?php

namespace Database\Seeders;

use App\Models\vendor;
use Illuminate\Database\Seeder;
use Faker\Factory;

class VendorSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about Vendor, we are given the below data like  id, name, email, phone_number, password and address.
     * After we Run the database VendorSeeder.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $vendor = new vendor();
        $vendor->name = $faker->firstName;
        $vendor->email = $faker->email;
        $vendor->phone_number = $faker->phoneNumber;
        $vendor->password = $faker->password;
        $vendor->address = $faker-> address;
        $vendor->save();
     // Vendor::factory(4)->create();

    }
}
