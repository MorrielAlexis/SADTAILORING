<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMeasurementDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMeasurementDetail', function(Blueprint $table){
			$table->string('strInactiveDetailID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMeasurementDetail', function(Blueprint $table){

			$table->foreign('strInactiveDetailID')->references('strMeasurementDetailID')->on('tblMeasurementDetail');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonMeasurementDetail');

		Schema::table('tblReasonMeasurementDetail', function($table){
			$table->dropColumn('strInactiveDetailID');
		});
	}

}
