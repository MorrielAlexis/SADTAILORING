<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblUser', function(Blueprint $table){
			$table->string('strUserID')->primary();
			$table->string('strPassword');
			$table->string('strLoginEmpID')->index();
		});

		Schema::table('tblUser', function(Blueprint $table){

			$table->foreign('strLoginEmpID')->references('strEmployeeID')->on('tblEmployee');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblUser');

		Schema::table('tblUser', function($table){
			$table->dropColumn('strLoginEmpID');
		});
	}

}
