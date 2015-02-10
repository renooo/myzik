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

		$this->call('CountriesTableSeeder');
		$this->command->info('CountriesTable seeded !');

		$this->call('GenresTableSeeder');
		$this->command->info('GenresTable seeded !');
	}

}
