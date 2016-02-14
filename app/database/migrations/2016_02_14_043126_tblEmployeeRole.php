<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEmployeeRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblEmployeeRole', function(Blueprint $table){
			$table->string('strEmpRoleID')->primary();
			$table->string('strEmpRoleName');
			$table->text('txtEmpRoleDesc');
			$table->timestamps();
			$table->boolean('boolIsActive');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblEmployeeRole');
	}

}
