<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblDesignPattern extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblDesignPattern', function(Blueprint $table){
			$table->string('strDesignPatternID')->primary();
			$table->string('strDesignCategory')->index();//fk
			$table->string('strDesignSegmentName')->index();//fk
			$table->string('strPatternName');
			$table->string('strPatternImage')->nullable()->change();
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblDesignPattern', function(Blueprint $table){
			$table->foreign('strDesignCategory')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strDesignSegmentName')->references('strGarmentSegmentID')->on('tblGarmentSegment');
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
			$table->dropColumn('strDesignCategory');
			$table->dropColumn('strDesignSegmentName');
		});
	}

}
