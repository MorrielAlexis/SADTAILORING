<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustomerProfileCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCustomerProfileCompanies', function(Blueprint $table){
			$table->string('strCustProfComID')->primary();
			$table->string('strCustProfComName');
			$table->string('strCustProfComAddress');
			$table->string('strCustProfComDesc');
			$table->string('strCustProfComEmail');
			$table->string('strCustProfComCellNo');
			$table->string('strCustProfComPhoneNo');
			$table->string('strCustProfComFax');
			$table->string('strCustProfComContactPerson');
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
		Schema::dropIfExists('tblCustomerProfileCompanies');
	}

}
