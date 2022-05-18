<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Here Transactions data store in Database, like id, card_number, vendor_name, transaction_amount, limit_balance, transaction_date,  transaction_status, and transaction_type.
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('card_number');
            $table->foreign('card_number')->references('card_number')->on('cards');
            $table->string('vendor_name');
            $table->integer('transaction_amount');
            $table->integer('limit_balance');
            $table->timestamp('transaction_date');
            $table->boolean('transaction_status');
            $table->string('transaction_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
