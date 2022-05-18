<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\ChildUser;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about Card, we are given the below data like  card_number, exp_date, cvv, child_id is a foreign_key.
     * After we Run the database CardSeeder.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $child = ChildUser::all()->random();
        $card = new Card();
        $card->child_id = $child->id;
        //$card->child_name =$child->first_name;
        $card->card_number=$faker->creditCardNumber;
        $card->exp_date=$faker->creditCardExpirationDate;
        $card->cvv=$faker->numberBetween(100,999);
        $card->save();
    }
}
