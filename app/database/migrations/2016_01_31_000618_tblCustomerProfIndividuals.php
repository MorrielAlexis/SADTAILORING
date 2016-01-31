<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustomerProfIndividuals extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCustomerProfIndividuals', function(Blueprint $table){
			$table->integer('strCustProfIndID')->primary();
			$table->string('strCustProfIndName');
			$table->string('strCustProfIndAddress');
			$table->string('strCustProfIndEmail');
			$table->string('strCustProfIndCellNo');
			$table->string('strCustProfIndPhoneNo');
			$table->string('strCustProfIndFax');
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
		Schema::dropIfExists('tblCustomerProfIndividuals');
	}

}
