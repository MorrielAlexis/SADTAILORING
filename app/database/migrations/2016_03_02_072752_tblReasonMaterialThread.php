<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMaterialThread extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMaterialThread', function(Blueprint $table){
			$table->string('strInactiveThreadID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMaterialThread', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonMaterialThread');

		Schema::table('tblReasonMaterialThread', function($table){
			$table->dropColumn('strInactiveThreadID');
		});
	}

}
