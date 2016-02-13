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
			$table->string('strGarmentCategoryName')->index();//fk
			$table->string('strGarmentSegmentName')->index();//fk
			$table->string('strMeasurementName')->index();//fk
			$table->timestamps();
		});

		Schema::table('tblDesignPattern', function(Blueprint $table){

			$table->foreign('strGarmentCategoryName')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strGarmentSegmentName')->references('strGarmentSegmentID')->on('tblGarmentSegment');
			$table->foreign('strMeasurementName')->references('strMeasurementDetailID')->on('tblMeasurementDetail');
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
			$table->dropColumn('strMeasurementName');
		});



	}

}
