<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonDesignPattern extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonDesignPattern', function(Blueprint $table){
			$table->string('strInactivePatternID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonDesignPattern', function(Blueprint $table){

			$table->foreign('strInactivePatternID')->references('strDesignPatternID')->on('tblDesignPattern');
			});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonDesignPattern');

		Schema::table('tblReasonDesignPattern', function($table){
			$table->dropColumn('strInactivePatternID');
		});	}

}
