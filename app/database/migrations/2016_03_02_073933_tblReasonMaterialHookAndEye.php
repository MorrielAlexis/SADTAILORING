<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMaterialHookAndEye extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMaterialHookAndEye', function(Blueprint $table){
			$table->string('strInactiveHookID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMaterialHookAndEye', function(Blueprint $table){

			$table->foreign('strInactiveHookID')->references('strMaterialHookID')->on('tblMaterialHookAndEye');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonMaterialHookAndEye');

		Schema::table('TblReasonMaterialHookAndEye', function($table){
			$table->dropColumn('strInactiveHookID');
		});
	}

}
