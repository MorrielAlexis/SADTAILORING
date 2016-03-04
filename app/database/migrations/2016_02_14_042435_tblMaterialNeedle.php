<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblMaterialNeedle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMaterialNeedle', function(Blueprint $table){
			$table->string('strMaterialNeedleID')->primary();
			$table->string('strMaterialNeedleName');
			$table->string('strMaterialNeedleSize');
			$table->string('strMaterialNeedleDesc')->nullable()->change();
			$table->string('strMaterialNeedleImage')->nullable()->change();
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
		Schema::dropIfExists('tblMaterialNeedle');
	}

}
