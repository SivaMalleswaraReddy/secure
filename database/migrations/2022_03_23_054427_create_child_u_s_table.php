<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_u_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('parent_u_s');
            $table->string('first_name');
        $table->string('last_name');
        $table->date('dob');
        $table->string('email');
        $table->integer('phone_number');
        $table->string('gender');
        $table->integer('limit');
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
        Schema::dropIfExists('child_u_s');
    }
}
