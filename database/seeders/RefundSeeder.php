<?php

namespace Database\Seeders;
use App\Models\refunds;
use App\Models\Transaction;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefundSeeder extends Seeder
{
    /**
     * Here we are using faker for generate the fake data about Refund, we are given the below data like  id, refund_amount, refund_status, refund_date and transaction_id is a foreign_key.
     * After we Run the database RefundSeeder.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $transaction = Transaction::all()->random();
        $trans_id = $transaction->id;
        $trans_amount = $transaction->transaction_amount;
        $trans_status = $transaction->transaction_status;
        $transaction_date = $transaction->transaction_date;

        if ($trans_status == false) {
            DB::table('refunds')->insert([
                'transaction_id' => $trans_id,
                'refund_amount' => $trans_amount = $faker->numberBetween(100,5000),
                'refund_date' => $faker->dateTimeBetween($transaction_date, '+1 week'),
                'refund_status' => rand(0,1),


//
//        $faker = Factory::create();
//        $transaction = Transaction::all()->random();
//        $refund  = new refunds();
//        $refund -> refund_amount = $faker->numberBetween(100,5000);
//        $refund->refund_date = $refund->tr_date;
//        $refund-> refund_status = $tr
//        $transaction->transaction_id = $transaction->id;
            ]);
        }
    }

}
