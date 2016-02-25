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
			$table->string('strEmpMName')->nullable()->change();
			$table->string('strEmpLName');
			$table->string('strEmpAge');
			$table->string('strSex');
			$table->string('strEmpAddress');
			$table->string('strRole')->index();//fk
			$table->string('strCellNo');
			$table->string('strCellNoAlt')->nullable();
			$table->string('strPhoneNo')->nullable()->change();
			$table->string('strEmailAdd')->nullable()->change();
			$table->boolean('boolIsActive');
			//$table->datetime('dtUpdatedAt');
			$table->timestamps();
		});


		Schema::table('tblEmployee', function(Blueprint $table){

			$table->foreign('strRole')->references('strEmpRoleID')->on('tblEmployeeRole');
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

		Schema::table('tblEmployee', function($table){
			$table->dropColumn('strRole');
		});
	}

}
