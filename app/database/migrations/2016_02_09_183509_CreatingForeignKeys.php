<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatingForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tblCustomer', function($table){
			$table->foreign('strAcctType')->references('strCustAcctType')->on('tblCustomerAcctType');
		});

		Schema::table('tblCustCompany', function($table){
			$table->foreign('strTypeID')->references('strCustTypeID')->on('tblCustomeType');
			$table->foreign('strCustID')->references('strCustomerID')->on('tblCustomer');
		});

		Schema::table('tblCustPrivateIndividual', function($table){
			$table->foreign('strTypeID')->references('strCustTypeID')->on('tblCustomeType');
			$table->foreign('strCustID')->references('strCustomerID')->on('tblCustomer');
			$table->foreign('intGender')->references('intGenderID')->on('tblGender');
		});

		Schema::table('tblEmployeeJobProgress', function($table){
			//$table->foreign('strOrderID')->references('strOrderID')->on('tblOrder');
			$table->foreign('intJobProgress')->references('intJobProgressID')->on('tblJobProgressDetail');
			$table->foreign('strEmpID')->references('strEmployeeID')->on('tblEmployee');
		});

		Schema::table('tblEmployee', function($table){
			$table->foreign('intGender')->references('intGenderID')->on('tblGender');
			$table->foreign('strRole')->references('strEmpRoleID')->on('tblEmployeeRole');
		});


		Schema::table('tblGarmentSegment', function($table){
			$table->foreign('strCategory')->references('strGarmentCategoryID')->on('tblGarmentCategory');
		});

		Schema::table('tblDesignPattern', function($table){
			$table->foreign('strSegment')->references('strGarmentSegmentID')->on('tblGarmentSegment');
		});

		Schema::table('tblMeasurementHeader', function($table){
			$table->foreign('strGarmentCategory')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strGarmentSegment')->references('strGarmentSegmentID')->on('tblGarmentSegment');
			$table->foreign('strDesignPattern')->references('strDesignPatternID')->on('tblDesignPattern');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tblCustomer', function($table){
			$table->dropColumn('strAcctType');
		});

		Schema::table('tblCustCompany', function($table){
			$table->dropColumn('strTypeID');
			$table->dropColumn('strCustID');
		});

		Schema::table('tblCustPrivateIndividual', function($table){
			$table->dropColumn('strTypeID');
			$table->dropColumn('strCustID');
			$table->dropColumn('intGender');
		});

		Schema::table('tblEmployeeJobProgress', function($table){
			$table->dropColumn('intJobProgress');
			$table->dropColumn('strEmpID');
		});

		Schema::table('tblCustomer', function($table){
			$table->dropColumn('intGender');
			$table->dropColumn('strRole');
		});

	}

}
