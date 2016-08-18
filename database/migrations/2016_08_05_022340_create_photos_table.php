<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('photos', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('description');

				$table->integer('section_id')->unsigned();
				$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

				$table->integer('order');

				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('photos');
	}
}
