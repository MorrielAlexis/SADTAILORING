<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMaterialHookAndEye extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMaterialHookAndEye', function(Blueprint $table){
			$table->string('strInactiveHookID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMaterialHookAndEye', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonMaterialHookAndEye');

		Schema::table('tblReasonMaterialHookAndEye', function($table){
			$table->dropColumn('strInactiveHookID');
		});
	}

}
