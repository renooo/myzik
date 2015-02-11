<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('record_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->timestamps();

			$table->foreign('record_id')->references('id')->on('records');
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
		Schema::drop('record_user');
	}

}
