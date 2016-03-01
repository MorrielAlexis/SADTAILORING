<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonEmployee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonEmployee', function(Blueprint $table){
			$table->string('strInactiveEmployeeID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonEmployee', function(Blueprint $table){

			$table->foreign('strInactiveEmployeeID')->references('strEmployeeID')->on('tblEmployee');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonEmployee');

		Schema::table('TblReasonEmployee', function($table){
			$table->dropColumn('strInactiveEmployeeID');
		});
	}

}
