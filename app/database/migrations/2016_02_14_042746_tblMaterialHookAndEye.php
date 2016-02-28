<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMaterialHookAndEye extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblMaterialHookAndEye', function(Blueprint $table){
			$table->string('strMaterialHookID')->primary();
			$table->string('strMaterialHookName');
			$table->string('strMaterialHookSize');
			$table->string('strMaterialHookColor');
			$table->string('strMaterialHookImage')->nullable()->change();
			$table->string('strMaterialHookDesc', 255);
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
		Schema::dropIfExists('TblMaterialHookAndEye');
	}

}
