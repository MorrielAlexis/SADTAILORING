<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustomerAcctType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCustomerAcctType', function(Blueprint $table){
			$table->string('strCustAcctTypeID')->primary();
			$table->string('strCustAcctTypeName');
			$table->text('txtCustAcctTypeDesc');
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
		Schema::dropIfExists('tblCustomerAcctType');
	}

}
