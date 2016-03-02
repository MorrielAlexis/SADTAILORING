<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonMaterialZipper extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonMaterialZipper', function(Blueprint $table){
			$table->string('strInactiveZipperID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonMaterialZipper', function(Blueprint $table){

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
		Schema::dropIfExists('TblReasonMaterialZipper');

		Schema::table('TblReasonMaterialZipper', function($table){
			$table->dropColumn('strInactiveZipperID');
		});
	}

}
