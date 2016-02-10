<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblGarmentCategory extends Migration {

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
			$table->text('txtGarmentCategoryDesc');
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
