<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonSwatches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonSwatches', function(Blueprint $table){
			$table->string('strInactiveSwatchID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonSwatches', function(Blueprint $table){

			$table->foreign('strInactiveSwatchID')->references('strSwatchID')->on('tblSwatches');
			});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonSwatches');

		Schema::table('tblReasonSwatches', function($table){
			$table->dropColumn('strInactiveSwatchID');
		});	}

}
