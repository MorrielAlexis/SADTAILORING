<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonGarmentCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonGarmentCategory', function(Blueprint $table){
			$table->string('strInactiveGarmentID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonGarmentCategory', function(Blueprint $table){

			$table->foreign('strInactiveGarmentID')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonGarmentCategory');

		Schema::table('tblReasonGarmentCategory', function($table){
			$table->dropColumn('strInactiveGarmentID');
		});	}

}
