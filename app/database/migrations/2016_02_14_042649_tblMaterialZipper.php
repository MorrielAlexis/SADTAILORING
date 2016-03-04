<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblMaterialZipper extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMaterialZipper', function(Blueprint $table){
			$table->string('strMaterialZipperID')->primary();
			$table->string('strMaterialZipperName');
			$table->string('strMaterialZipperSize');
			$table->string('strMaterialZipperColor');
			$table->string('strMaterialZipperDesc', 255)->nullable()->change();
			$table->string('strMaterialZipperImage')->nullable()->change();
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
		Schema::dropIfExists('tblMaterialZipper');
	}

}
