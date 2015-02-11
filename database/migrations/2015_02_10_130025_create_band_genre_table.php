<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandGenreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('band_genre', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('band_id')->unsigned()->index();
			$table->integer('genre_id')->unsigned()->index();
			$table->nullableTimestamps();

			$table->foreign('band_id')->references('id')->on('band');
			$table->foreign('genre_id')->references('id')->on('genres');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('band_genre');
	}

}
