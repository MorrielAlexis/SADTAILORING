<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonFabricType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonFabricType', function(Blueprint $table){
			$table->string('strInactiveFabricTypeID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonFabricType', function(Blueprint $table){

			$table->foreign('strInactiveFabricTypeID')->references('strFabricTypeID')->on('tblFabricType');
			});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonFabricType');

		Schema::table('tblReasonFabricType', function($table){
			$table->dropColumn('strInactiveFabricTypeID');
		});	}

}
