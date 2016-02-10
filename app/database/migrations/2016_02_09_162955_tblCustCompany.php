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
			$table->string('strCustCompanyID')->primary();
			$table->string('strTypeID');//fk
			$table->string('strCustID');//fk
			$table->string('strCustCompanyName');
			$table->string('strCustCompanyAddress');
			$table->string('strCustContactPerson');
			$table->string('strCustCompanyEmailAddress');
			$table->string('strCustPhoneNumber');
			$table->string('strCustLandlineNumber');
			$table->string('strCustFaxNumber');
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
