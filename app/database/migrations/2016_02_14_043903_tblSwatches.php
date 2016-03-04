<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblSwatches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblSwatches', function(Blueprint $table){
			$table->string('strSwatchID')->primary();
			$table->string('strSwatchFabricTypeName')->index();
			$table->string('strSwatchName');
			$table->string('strSwatchCode');
			$table->string('strSwatchImage')->nullable()->change();
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblSwatches', function(Blueprint $table){

			$table->foreign('strSwatchFabricTypeName')->references('strFabricTypeID')->on('tblFabricType');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblSwatches');

		Schema::table('tblSwatches', function($table){
			$table->dropColumn('strSwatchFabricTypeName');	
		});
	}

}
