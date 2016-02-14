<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSwatches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblSwatches', function(Blueprint $table){
			$table->string('strSwatchID')->primary();
			$table->string('strFabricTypeName');
			$table->string('strSwatchName');
			$table->string('strSwatchCode');
			$table->string('strSwatchImageLink');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('TblSwatches', function(Blueprint $table){

			$table->foreign('strFabricTypeName')->references('strFabricTypeID')->on('tblFabricType');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblSwatches');

		Schema::table('TblSwatches', function($table){
			$table->dropColumn('strFabricTypeName');
		});
	}

}
