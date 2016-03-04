<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMaterialNeedle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMaterialNeedle', function(Blueprint $table){
			$table->string('strInactiveNeedleID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMaterialNeedle', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonMaterialNeedle');

		Schema::table('tblReasonMaterialNeedle', function($table){
			$table->dropColumn('strInactiveNeedleID');
		});
	}

}
