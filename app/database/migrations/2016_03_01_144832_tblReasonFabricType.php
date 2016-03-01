<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonFabricType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonFabricType', function(Blueprint $table){
			$table->string('strInactiveFabricTypeID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonFabricType', function(Blueprint $table){

			$table->foreign('strInactiveFabricTypeID')->references('strFabricTypeID')->on('tblFabricType');
			});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonFabricType');

		Schema::table('TblReasonFabricType', function($table){
			$table->dropColumn('strInactiveFabricTypeID');
		});	}

}
