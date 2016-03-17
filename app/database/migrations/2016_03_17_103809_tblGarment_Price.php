<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblGarmentPrice extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblGarment_Price', function(Blueprint $table){
			$table->integer('intPriceID')->primary()->increments();
			$table->string('strCategoryID')->index();//fk
			$table->string('strSegmentID')->index();//fks
			$table->double('dblPrice');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblGarment_Price', function(Blueprint $table){
			$table->foreign('strCategoryID')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strSegmentID')->references('strGarmentSegmentID')->on('tblGarmentSegment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblGarment_Price');

		Schema::table('tblGarment_Price', function($table){
			$table->dropColumn('intPriceID');
			$table->dropColumn('strCategoryID');
			$table->dropColumn('strSegmentID');
		});
	}

}
