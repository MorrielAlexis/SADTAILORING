<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMeasurement extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMeasurement', function(Blueprint $table){
			$table->string('strJobOrderID')->index();//fk
			$table->string('strCategoryID')->index();//fk
			$table->string('strSegmentID')->index();//fk
			$table->primary('strJobOrderID', 'strCategoryID', 'strSegmentID');//primary keys
			$table->string('strMeasurePartName');
			$table->double('dblMeasurement');
			$table->string('strNotes');
		});

		Schema::table('tblMeasurement', function(Blueprint $table){
			$table->foreign('strJobOrderID')->references('strJobOrderID')->on('tblJobOrder');
			$table->foreign('strCategoryID')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strSegmentID')->references('strGarmentSegmentID')->on('tblGarmentSegment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblMeasurement');

		Schema::table('tblMeasurement', function($table){
			$table->dropColumn('strJobOrderID');
			$table->dropColumn('strCategoryID');
			$table->dropColumn('strSegmentID');
		});
	}

}
