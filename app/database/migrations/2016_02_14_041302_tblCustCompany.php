<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblCustCompany extends Migration {

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
			$table->string('strCustCompanyHouseNo');
			$table->string('strCustCompanyStreet');
			$table->string('strCustCompanyBarangay')->nullable()->change();
			$table->string('strCustCompanyCity');
			$table->string('strCustCompanyProvince');
			$table->string('strCustCompanyZipCode');
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
