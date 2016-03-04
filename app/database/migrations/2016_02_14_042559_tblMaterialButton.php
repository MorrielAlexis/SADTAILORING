<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblMaterialButton extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMaterialButton', function(Blueprint $table){
			$table->string('strMaterialButtonID')->primary();
			$table->string('strMaterialButtonName');
			$table->string('strMaterialButtonSize');
			$table->string('strMaterialButtonColor');
			$table->string('strMaterialButtonDesc')->nullable()->change();
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
		Schema::dropIfExists('tblMaterialButton');
	}

}
