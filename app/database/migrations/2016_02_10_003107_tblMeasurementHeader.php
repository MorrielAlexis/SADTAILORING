<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMeasurementHeader extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMeasurementHeader', function(Blueprint $table){
			$table->string('strMeasurementID')->primary();
			$table->string('strGarmentCategory');//fk
			$table->string('strGarmentSegment');//fk
			$table->string('strDesignPattern');//fk
			$table->string('strMeasurementName');
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
		Schema::dropIfExists('tblMeasurementHeader');
	}

}
