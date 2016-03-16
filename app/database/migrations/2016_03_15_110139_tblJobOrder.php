<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblJobOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblJobOrder', function(Blueprint $table){
			$table->string('strJobOrderID')->primary();
			$table->string('strJobDescID')->index();//fk
			$table->string('strCustomerID')->index();//fk
			$table->string('strTermsPaymentID')->index();//fk
			$table->string('strCustomerType');
			$table->integer('intOrderQuantity');
			$table->datetime('dtOrderDate');
			$table->datetime('dtRequiredDate');
			$table->datetime('dtDeliveryDate');
			$table->boolean('boolIsFinished');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblJobOrder', function(Blueprint $table){
			$table->foreign('strJobDescID')->references('strJobDescriptionID')->on('tblJobDescription');
			$table->foreign('strCustomerID')->references('strCustomerID')->on('tblCustomer');
			$table->foreign('strTermsPaymentID')->references('strTermsOfPaymentID')->on('tblTermsOfPayment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblJobOrder');

		Schema::table('tblJobOrder', function($table){
			$table->dropColumn('strJobDescID');
			$table->dropColumn('strCustomerID');
			$table->dropColumn('strTermsPaymentID');
		});
	}

}
