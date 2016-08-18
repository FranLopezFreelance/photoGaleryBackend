<?php

use Illuminate\Database\Seeder;

class SecTypesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('types')->insert(
			[
				'name'      => 'Principal',
				'principal' => 1,
				'childs'    => 0,
			]);
		DB::table('types')->insert([
				'name'      => 'Principal con Subsecciones',
				'principal' => 1,
				'childs'    => 1,
			]);
		DB::table('types')->insert([
				'name'      => 'Subseccion Principal',
				'principal' => 0,
				'childs'    => 0,
			]);
		DB::table('types')->insert([
				'name'      => 'Subseccion con Subsecciones',
				'principal' => 0,
				'childs'    => 1,
			]);
	}
}
