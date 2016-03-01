<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonSwatches extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonSwatches', function(Blueprint $table){
			$table->string('strInactiveSwatchID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonSwatches', function(Blueprint $table){

			$table->foreign('strInactiveSwatchID')->references('strSwatchID')->on('tblSwatches');
			});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonSwatches');

		Schema::table('TblReasonSwatches', function($table){
			$table->dropColumn('strInactiveSwatchID');
		});	}

}
