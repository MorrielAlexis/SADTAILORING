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
			$table->string('strCustPrivFName');
			$table->string('strCustPrivLName');
			// $table->string('strPrivSex');
			$table->string('strCustPrivAddress');
			$table->string('strCustPrivLandlineNumber');
			$table->string('strCustPrivCPNumber');		
			$table->string('strCustPrivEmailAddress');
			$table->boolean('boolIsActive');
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
