<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('sections', function (Blueprint $table) {
				$table->increments('id');

				$table->integer('type_id')->unsigned();
				$table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

				$table->integer('section_id');
				$table->integer('type_view');
				$table->string('name');
				$table->string('order');
				$table->integer('active');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('sections');
	}
}
