<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMeasurementDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblMeasurementDetail', function(Blueprint $table){
			$table->string('strMeasurementDetailID')->primary();
			$table->string('strMeasurementDetailName');
			$table->string('strMeasurementDetailDesc');
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
		Schema::dropIfExists('TblMeasurementDetail');
	}

}
