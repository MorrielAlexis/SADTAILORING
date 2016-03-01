<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonGarmentCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonGarmentCategory', function(Blueprint $table){
			$table->string('strInactiveGarmentID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonGarmentCategory', function(Blueprint $table){

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
		Schema::dropIfExists('TblReasonGarmentCategory');

		Schema::table('TblReasonGarmentCategory', function($table){
			$table->dropColumn('strInactiveGarmentID');
		});	}

}
