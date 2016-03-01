<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonRole', function(Blueprint $table){
			$table->string('strInactiveRoleID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonRole', function(Blueprint $table){

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
		Schema::dropIfExists('TblReasonRole');

		Schema::table('TblReasonRole', function($table){
			$table->dropColumn('strInactiveRoleID');
		});
	}

}
