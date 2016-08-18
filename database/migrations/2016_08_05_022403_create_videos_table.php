<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('videos', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('description');
				$table->integer('type_id')->unsigned();

				$table->integer('section_id')->unsigned();
				$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

				$table->string('url');
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
		Schema::drop('videos');
	}
}
