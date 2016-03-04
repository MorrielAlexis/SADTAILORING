<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonRole', function(Blueprint $table){
			$table->string('strInactiveRoleID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonRole', function(Blueprint $table){

			$table->foreign('strInactiveRoleID')->references('strEmpRoleID')->on('tblEmployeeRole');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonRole');

		Schema::table('tblReasonRole', function($table){
			$table->dropColumn('strInactiveRoleID');
		});
	}

}
