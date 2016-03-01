<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonSegment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonSegment', function(Blueprint $table){
			$table->string('strInactiveSegmentID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonSegment', function(Blueprint $table){

			$table->foreign('strInactiveSegmentID')->references('strGarmentSegmentID')->on('tblGarmentSegment');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonSegment');

		Schema::table('TblReasonSegment', function($table){
			$table->dropColumn('strInactiveSegmentID');
		});	}

}
