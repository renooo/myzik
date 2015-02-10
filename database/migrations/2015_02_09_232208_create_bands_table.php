<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->boolean('active')->default(true);
			$table->date('active_from')->nullable();
			$table->date('active_to')->nullable();
			$table->string('country_id', 2)->nullable();
			$table->foreign('country_id')->references('id')->on('countries');
			$table->text('biography')->nullable();
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
		Schema::drop('bands');
	}

}
