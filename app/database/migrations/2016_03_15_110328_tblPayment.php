<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPayment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblPayment', function(Blueprint $table){
			$table->string('strPaymentID')->primary();
			$table->string('strJobOrderID')->index();//fk
			$table->string('strPaymentType');
			$table->double('dblAmountPaid');
			$table->double('dblBalance');
			$table->double('dblAmountTendered');
			$table->boolean('boolIsPaid');
			$table->datetime('dtPaymentDate');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblPayment', function(Blueprint $table){
			$table->foreign('strJobOrderID')->references('strJobOrderID')->on('tblJobOrder');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblPayment');

		Schema::table('tblPayment', function($table){
			$table->dropColumn('strJobOrderID');
		});
	}

}
