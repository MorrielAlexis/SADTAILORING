<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblInitialPayment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblInitialPayment', function(Blueprint $table){
			$table->string('strInPaymentID')->index();//fk
			$table->primary('strInitialPaymentID');//primary key
			$table->double('dblDownpaymentRate');
			$table->double('dblDownpaymentAmt');
			$table->boolean('boolIsPaid');
			$table->datetime('dtPaymentDate');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblInitialPayment', function(Blueprint $table){
			$table->foreign('strInPaymentID')->references('strPaymentID')->on('tblPayment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblInitialPayment');

		Schema::table('tblInitialPayment', function($table){
			$table->dropColumn('strPaymentID');
		});
	}

}
