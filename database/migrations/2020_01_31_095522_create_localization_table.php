<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localization', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('field')->nullable();
			$table->string('language')->nullable();
			$table->string('value')->nullable();
			$table->string('lozalizable_type');
			$table->integer('lozalizable_id');
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
		Schema::dropIfExists('localization');
	}
}
