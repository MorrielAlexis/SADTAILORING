<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblJobOrderSegmentPattern extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblJobOrder_SegmentPattern', function(Blueprint $table){
			$table->string('strJobOrderID')->index();//fk
			$table->string('strSegPatternID')->index();//fk
			$table->primary('strJobOrderID', 'strSegPatternID');//primary key
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblJobOrder_SegmentPattern', function(Blueprint $table){
			$table->foreign('strJobOrderID')->references('strJobOrderID')->on('tblJobOrder');
			$table->foreign('strSegPatternID')->references('strDesignPatternID')->on('tblDesignPattern');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblJobOrder_SegmentPattern');

		Schema::table('tblJobOrder_SegmentPattern', function($table){
			$table->dropColumn('strJobOrderID');
			$table->dropColumn('strSegPatternID');
		});
	}

}
