<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMeasurementDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMeasurementDetail', function(Blueprint $table){
			$table->string('strInactiveDetailID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMeasurementDetail', function(Blueprint $table){

			$table->foreign('strInactiveDetailID')->references('strMeasurementDetailID')->on('TblMeasurementDetail');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonMeasurementDetail');

		Schema::table('TblReasonMeasurementDetail', function($table){
			$table->dropColumn('strInactiveDetailID');
		});
	}

}
