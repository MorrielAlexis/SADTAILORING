<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMaterialThread extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblMaterialThread', function(Blueprint $table){
			$table->string('strMaterialThreadID')->primary();
			$table->string('strMaterialThreadName');
			$table->string('strMaterialThreadColor');
			$table->string('strMaterialThreadImage');
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
		Schema::dropIfExists('TblMaterialThread');
	}

}
