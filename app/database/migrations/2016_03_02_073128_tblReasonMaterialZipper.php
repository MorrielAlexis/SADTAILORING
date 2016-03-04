<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonMaterialZipper extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonMaterialZipper', function(Blueprint $table){
			$table->string('strInactiveZipperID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonMaterialZipper', function(Blueprint $table){

			$table->foreign('strInactiveZipperID')->references('strMaterialZipperID')->on('tblMaterialZipper');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonMaterialZipper');

		Schema::table('tblReasonMaterialZipper', function($table){
			$table->dropColumn('strInactiveZipperID');
		});
	}

}
