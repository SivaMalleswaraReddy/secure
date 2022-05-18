<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\ChildUser;
use App\Models\Transaction;
use App\Models\vendor;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about Transaction, we are given the below data like  id, card_number, vendor_name, transaction_amount, limit_balance, transaction_date, transaction_status, and transaction_type.
     *After we Run the database TransactionSeeder.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $child = ChildUser::all()->random();
        $id = $child->id;
        $limits= DB::table('child_users')->select('monthly_limit')->where('id','=',$id)->first();
        $ls = $limits->monthly_limit;

        $card=Card::all()->random();
        $vendor = vendor::all()->random();
        $transaction = new Transaction();
        $transaction->card_number = "9876543210654321";
//        $transaction->card_number = $card->card_number;
        $transaction->vendor_name = $vendor->name;
        $t= $transaction->transaction_amount =0;
//        $t= $transaction->transaction_amount = $faker->numberBetween(100,5000);
        $ts= $transaction->transaction_status=true;

        $transaction->transaction_date = $faker->date();
        $ty = $transaction->transaction_type =['Debit','Credit','Refund'][rand(0,2)];
        $transaction->limit_balance = $this->limit($ts,$ls,$t);

        $transaction->save();
    }

    function limit($a, $b, $c){
        if (($a==1)and ($b>$c)){
            return $b-$c;
        }
        return $b;
    }
}
