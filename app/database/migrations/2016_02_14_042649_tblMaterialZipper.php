<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMaterialZipper extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblMaterialZipper', function(Blueprint $table){
			$table->string('strMaterialZipperID')->primary();
			$table->string('strMaterialZipperName');
			$table->string('strMaterialZipperSize');
			$table->string('strMaterialZipperColor');
			$table->string('strMaterialZipperImage');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblMaterialZipper');
	}

}
