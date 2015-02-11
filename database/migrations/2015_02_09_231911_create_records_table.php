<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('records', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->date('release_date');
			$table->integer('label_id')->nullable();
			$table->integer('format_id');
			$table->string('catalog_number')->nullable();
			$table->text('description');
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			$table->foreign('label_id')->references('id')->on('labels');
			$table->foreign('format_id')->references('id')->on('formats');
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
		Schema::drop('records');
	}

}
