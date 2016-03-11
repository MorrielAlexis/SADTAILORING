<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblCustPrivateIndividual extends Migration {

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
			$table->string('strCustPrivMName')->nullable()->change();
			// $table->string('strPrivSex');
			$table->string('strCustPrivHouseNo');
			$table->string('strCustPrivStreet');
			$table->string('strCustPrivBarangay')->nullable()->change();
			$table->string('strCustPrivCity');
			$table->string('strCustPrivProvince');
			$table->string('strCustPrivZipCode');
			$table->string('strCustPrivLandlineNumber')->nullable()->change();
			$table->string('strCustPrivCPNumber');		
			$table->string('strCustPrivCPNumberAlt')->nullable();	
			$table->string('strCustPrivEmailAddress')->nullable()->change();
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
		Schema::dropIfExists('tblCustPrivateIndividual');
	}

}
