<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentUsersTable extends Migration
{
    /**
     * Here ParentUser data store in Database, like id, name, email, phone_number, password, address, pan_card, gender, is_approved.
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password')->unique();
            $table->string('address');
            $table->string('pan_card')->unique();
            $table->string('gender');
            $table->string('is_approved');
            $table->rememberToken();
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
        Schema::dropIfExists('parent_users');
    }
}
