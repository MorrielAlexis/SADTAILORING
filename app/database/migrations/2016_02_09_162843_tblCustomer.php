<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustomer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCustomer', function(Blueprint $table){
			$table->string('strCustomerID')->primary();
			$table->string('strAcctType');//fk
			$table->string('strCustAcctEmail');
			$table->string('strCustAcctPassword');
			$table->datetime('dtCreatedAt');
			$table->datetime('dtUpdatedAt');
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
		Schema::dropIfExists('tblCustomer');
	}

}
