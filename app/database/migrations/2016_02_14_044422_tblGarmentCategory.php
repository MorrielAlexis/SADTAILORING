<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblGarmentCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblGarmentCategory', function(Blueprint $table){
			$table->string('strGarmentCategoryID')->primary();
			$table->string('strGarmentCategoryName');
			$table->string('strGarmentCategoryDesc', 255)->nullable()->change();
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
		Schema::dropIfExists('tblGarmentCategory');
	}

}
