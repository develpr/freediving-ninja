<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //Constant Weight No Fins, Static Apnea
            $table->string('abbreviation'); //CWNF, CNF, etc
            $table->string('measurement'); //seconds, meters, etc
            $table->integer('gender');
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
        Schema::drop('events');
	}

}
