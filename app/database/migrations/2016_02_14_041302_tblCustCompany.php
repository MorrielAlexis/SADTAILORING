<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		chema::create('tblCustCompany', function(Blueprint $table){
			$table->engine = 'InnoDB';
			$table->string('strCustCompanyID')->primary();
			//$table->string('strAcctTypeID')->index();//fk
			//$table->string('strCustID')->unique();
			$table->string('strCustCompanyName');
			$table->string('strCustCompanyAddress');
			$table->string('strCustContactPerson');
			$table->string('strCustCompanyEmailAddress');
			$table->string('strCustCompanyTelNumber');
			$table->string('strCustCompanyCPNumber');
			$table->string('strCustCompanyFaxNumber');
			$table->boolean('boolIsActive');
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
		Schema::dropIfExists('tblCustCompany');
	}

}
