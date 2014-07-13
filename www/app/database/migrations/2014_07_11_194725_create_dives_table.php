<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('dives', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('max_depth');
            $table->double('dive_length');
            $table->double('water_temperature');
            $table->text('data_points');
            $table->text('conditions');
            $table->string('location');
            $table->text('comments');
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
        Schema::drop('dives');
	}

}
