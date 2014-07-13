<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('casual'); //is the diver normally diving for fun, or are they normally doing training
            $table->integer('gender');
            $table->string('remember_token', 100);
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
        Schema::drop('users');
	}

}
