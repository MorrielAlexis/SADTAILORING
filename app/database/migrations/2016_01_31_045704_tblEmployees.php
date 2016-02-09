<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEmployees extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblEmployees', function(Blueprint $table){
			$table->string('strEmpID')->primary();
			$table->string('strEmpFName');
			$table->string('strEmpLName');
			$table->string('strEmpAddress');
			$table->integer('intEmpAge');
			$table->string('strEmpRoleID');//fk
			$table->string('strCellNo');
			$table->string('strPhoneNo');
			$table->string('strEmailAdd');
			// $table->boolean('actStatus')->default('1');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblEmployees');
	
	}

}
