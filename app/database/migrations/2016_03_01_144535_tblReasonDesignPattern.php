<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonDesignPattern extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonDesignPattern', function(Blueprint $table){
			$table->string('strInactivePatternID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonDesignPattern', function(Blueprint $table){

			$table->foreign('strInactivePatternID')->references('strDesignPatternID')->on('tblDesignPattern');
			});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonDesignPattern');

		Schema::table('TblReasonDesignPattern', function($table){
			$table->dropColumn('strInactivePatternID');
		});	}

}
