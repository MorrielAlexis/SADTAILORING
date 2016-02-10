<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEmployee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblEmployee', function(Blueprint $table){
			$table->string('strEmployeeID')->primary();
			$table->string('strEmpFName');
			$table->string('strEmpLName');
			$table->string('strEmpAge');
			$table->string('strGender');//fk
			$table->string('strEmpAddress');
			$table->string('strRole');//fk
			$table->datetime('dtUpdatedAt');
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
		Schema::dropIfExists('tblEmployee');
	}

}
