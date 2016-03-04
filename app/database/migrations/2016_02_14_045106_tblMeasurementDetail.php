<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblMeasurementDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMeasurementDetail', function(Blueprint $table){
			$table->string('strMeasurementDetailID')->primary();
			$table->string('strMeasurementDetailName');
			$table->string('strMeasurementDetailDesc', 255)->nullable()->change();
			$table->boolean('boolIsActive');
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
		Schema::dropIfExists('tblMeasurementDetail');
	}

}
