<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMeasurementCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMeasurementCategory', function(Blueprint $table){
			$table->string('strInactiveHeadID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMeasurementCategory', function(Blueprint $table){

			$table->foreign('strInactiveHeadID')->references('strMeasurementID')->on('tblMeasurementHeader');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonMeasurementCategory');

		Schema::table('TblReasonMeasurementCategory', function($table){
			$table->dropColumn('strInactiveHeadID');
		});
	}

}
