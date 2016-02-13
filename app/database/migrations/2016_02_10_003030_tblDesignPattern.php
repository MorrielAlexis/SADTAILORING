<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDesignPattern extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblDesignPattern', function(Blueprint $table){
			$table->string('strDesignPatternID')->primary();
			$table->string('strSegmentName')->index();//fk
			$table->string('strPatternName');
			$table->string('strPatternImage');
			$table->timestamps();
		});

		Schema::table('tblDesignPattern', function(Blueprint $table){

			$table->foreign('strSegment')->references('strGarmentSegmentID')->on('tblGarmentSegment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblDesignPattern');

		Schema::table('tblDesignPattern', function($table){
			$table->dropColumn('strSegment');
		});
	}

}
