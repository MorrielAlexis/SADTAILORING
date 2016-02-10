<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\QueryException;
use Illuminate\Database\Migrations\Migration;

class TblCustCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCustCompany', function(Blueprint $table){
			$table->engine = 'InnoDB';
			$table->string('strCustCompanyID')->primary();
			//$table->string('strAcctTypeID')->index();//fk
			//$table->string('strCustID')->unique();
			$table->string('strCustCompanyName');
			$table->string('strCustCompanyAddress');
			$table->string('strCustContactPerson');
			$table->string('strCustCompanyEmailAddress');
			$table->string('strCustPhoneNumber');
			$table->string('strCustLandlineNumber');
			$table->string('strCustFaxNumber');
			$table->timestamps();
		});

		/*Schema::table('tblCustCompany', function(Blueprint $table){
			
			$table->foreign('strAcctTypeID')->references('strCustAcctTypeID')->on('tblCustomerAcctType');
			//$table->foreign('strCustID')->references('strCustomerID')->on('tblCustomer');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblCustCompany');

	}

}
