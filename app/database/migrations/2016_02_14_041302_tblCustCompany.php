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
		Schema::create('tblCustCompany', function(Blueprint $table){
			$table->engine = 'InnoDB';
			$table->string('strCustCompanyID')->primary();
			//$table->string('strAcctTypeID')->index();//fk
			//$table->string('strCustID')->unique();
			$table->string('strCustCompanyName');
			$table->string('strCustCompanyAddress');
			$table->string('strCustContactPerson');
			$table->string('strCustCompanyEmailAddress')->nullable()->change();
			$table->string('strCustCompanyTelNumber')->nullable()->change();
			$table->string('strCustCompanyCPNumber');
			$table->string('strCustCompanyCPNumberAlt')->nullable();
			$table->string('strCustCompanyFaxNumber')->nullable()->change();
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
