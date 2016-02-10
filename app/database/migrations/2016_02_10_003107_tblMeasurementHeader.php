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
			$table->string('strGarmentCategory')->index();
			$table->string('strGarmentSegment')->index();
			$table->string('strDesignPattern')->index();
			$table->string('strMeasurementName');
			$table->timestamps();
		});

		Schema::table('tblMeasurementHeader', function(Blueprint $table){

			$table->foreign('strGarmentCategory')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strGarmentSegment')->references('strGarmentSegmentID')->on('tblGarmentSegment');
			$table->foreign('strDesignPattern')->references('strDesignPatternID')->on('tblDesignPattern');
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

		Schema::table('tblMeasurementHeader', function($table){
			$table->dropColumn('strGarmentCategory');
			$table->dropColumn('strGarmentSegment');
			$table->dropColumn('strDesignPattern');
		});

	}

}
