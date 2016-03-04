<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMeasurementCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMeasurementCategory', function(Blueprint $table){
			$table->string('strInactiveHeadID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMeasurementCategory', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonMeasurementCategory');

		Schema::table('tblReasonMeasurementCategory', function($table){
			$table->dropColumn('strInactiveHeadID');
		});
	}

}
