<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonSegment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonSegment', function(Blueprint $table){
			$table->string('strInactiveSegmentID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonSegment', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonSegment');

		Schema::table('tblReasonSegment', function($table){
			$table->dropColumn('strInactiveSegmentID');
		});	}

}
