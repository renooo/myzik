<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		//$this->command->info('Seeding ...');

		$this->call('CountriesTableSeeder');
		$this->call('GenresTableSeeder');
		$this->call('FormatsTableSeeder');

		//DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
