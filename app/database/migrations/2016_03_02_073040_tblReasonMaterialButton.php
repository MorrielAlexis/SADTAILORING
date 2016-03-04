<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMaterialButton extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMaterialButton', function(Blueprint $table){
			$table->string('strInactiveButtonID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMaterialButton', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonMaterialButton');

		Schema::table('tblReasonMaterialButton', function($table){
			$table->dropColumn('strInactiveButtonID');
		});
	}

}
