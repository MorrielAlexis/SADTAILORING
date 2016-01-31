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
			$table->integer('intEmpID')->primary();
			$table->string('strEmpFName');
			$table->string('strEmpLName');
			$table->string('strEmpAddress');
			$table->integer('intEmpAge');
			$table->integer('strEmpRoleID');//fk
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
