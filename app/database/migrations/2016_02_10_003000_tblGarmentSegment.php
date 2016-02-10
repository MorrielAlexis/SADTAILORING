<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblGarmentSegment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblGarmentSegment', function(Blueprint $table){
			$table->string('strGarmentSegmentID')->primary();
			$table->string('strCategory')->index();
			$table->string('strSegmentName');
			$table->text('txtSegmentDesc');
			$table->timestamps();
		});

		Schema::table('tblGarmentSegment', function(Blueprint $table){

			$table->foreign('strCategory')->references('strGarmentCategoryID')->on('tblGarmentCategory');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblGarmentSegment');

		Schema::table('tblGarmentSegment', function($table){
			$table->dropColumn('strCategory');
		});
	}

}
