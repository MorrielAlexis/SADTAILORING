<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMaterialThread extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMaterialThread', function(Blueprint $table){
			$table->string('strInactiveThreadID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMaterialThread', function(Blueprint $table){

			$table->foreign('strInactiveThreadID')->references('strMaterialThreadID')->on('tblMaterialThread');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonMaterialThread');

		Schema::table('TblReasonMaterialThread', function($table){
			$table->dropColumn('strInactiveThreadID');
		});
	}

}
