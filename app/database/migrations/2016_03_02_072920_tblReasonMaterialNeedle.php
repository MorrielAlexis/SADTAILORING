<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMaterialNeedle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMaterialNeedle', function(Blueprint $table){
			$table->string('strInactiveNeedleID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMaterialNeedle', function(Blueprint $table){

			$table->foreign('strInactiveNeedleID')->references('strMaterialNeedleID')->on('tblMaterialNeedle');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonMaterialNeedle');

		Schema::table('TblReasonMaterialNeedle', function($table){
			$table->dropColumn('strInactiveNeedleID');
		});
	}

}
