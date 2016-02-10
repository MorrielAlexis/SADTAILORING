<?php

use Illuminate\Database\Schema\Blueprint;
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
			$table->string('strCustPrivIndivID')->primary();
			$table->string('strTypeID');//fk
			$table->string('strCustID');//fk
			$table->string('strCustFName');
			$table->string('strCustLName');
			$table->integer('intSex');//fk
			$table->string('strCustAddress');
			$table->string('strCustEmailAddress');
			$table->string('strCustPhoneNumber');
			$table->string('strCustLandlineNumber');
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
