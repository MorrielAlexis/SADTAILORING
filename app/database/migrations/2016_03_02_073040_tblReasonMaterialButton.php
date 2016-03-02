<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMaterialButton extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMaterialButton', function(Blueprint $table){
			$table->string('strInactiveButtonID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMaterialButton', function(Blueprint $table){

			$table->foreign('strInactiveButtonID')->references('strMaterialButtonID')->on('tblMaterialButton');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonMaterialButton');

		Schema::table('TblReasonMaterialButton', function($table){
			$table->dropColumn('strInactiveButtonID');
		});
	}

}
