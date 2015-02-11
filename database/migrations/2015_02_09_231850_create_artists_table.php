<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('real_name')->nullable();
			$table->date('birthdate')->nullable();
			$table->string('country_id', 2);
			$table->text('biography')->nullable();
			$table->integer('user_id')->unsigned();
			$table->nullableTimestamps();

			$table->foreign('country_id')->references('id')->on('countries');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('artists');
	}

}
