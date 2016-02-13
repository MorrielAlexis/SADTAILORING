<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMaterialButton extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblMaterialButton', function(Blueprint $table){
			$table->string('strMaterialButtonID')->primary();
			$table->string('strMaterialButtonName');
			$table->string('strMaterialButtonSize');
			$table->string('strMaterialButtonColor');
			$table->string('strMaterialButtonImage')->nullable()->change();
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
		Schema::dropIfExists('TblMaterialButton');
	}

}
