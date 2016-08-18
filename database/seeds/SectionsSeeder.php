<?php

use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('sections')->insert([
				'type_id'    => 1,
				'section_id' => 0,
				'name'       => 'Reels',
				'order'      => 1,
				'active'     => 1,
			]);
		DB::table('sections')->insert([
				'type_id'    => 2,
				'section_id' => 0,
				'name'       => 'Fotos',
				'order'      => 2,
				'active'     => 1,
			]);
		DB::table('sections')->insert([
				'type_id'    => 2,
				'section_id' => 0,
				'name'       => 'Videos',
				'order'      => 3,
				'active'     => 1,
			]);
	}
}
