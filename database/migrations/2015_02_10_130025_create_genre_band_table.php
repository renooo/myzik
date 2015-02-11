<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreBandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('genre_band', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('genre_id')->unsigned()->index();
			$table->integer('band_id')->unsigned()->index();
			$table->timestamps();

			$table->foreign('genre_id')->references('id')->on('genres');
			$table->foreign('band_id')->references('id')->on('band');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('genre_band');
	}

}
