<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\QueryException;
use Illuminate\Database\Migrations\Migration;

class TblCustPrivateIndividual extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCustPrivateIndividual', function(Blueprint $table){
			$table->engine = 'InnoDB';
			$table->string('strCustPrivIndivID')->primary();
			//$table->string('strAcctTypeID')->index();
			//$table->string('strCustID')->unique();
			$table->string('strCustFName');
			$table->string('strCustLName');
			$table->string('strSex');
			$table->string('strCustAddress');
			$table->string('strCustEmailAddress');
			$table->string('strCustPhoneNumber');
			$table->string('strCustLandlineNumber');
			$table->timestamps();
		});

		/*Schema::table('tblCustPrivateIndividual', function(Blueprint $table){

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
		Schema::dropIfExists('tblCustPrivateIndividual');

	}

}
