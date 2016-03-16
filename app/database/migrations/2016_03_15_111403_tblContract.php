<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblContract extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblContract', function(Blueprint $table){
			$table->string('strContractID')->primary();
			$table->string('strCustomerID')->index();//fk
			$table->datetime('dtDateIssued');
			$table->string('strApprovedBy');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblContract', function(Blueprint $table){
			$table->foreign('strCustomerID')->references('strCustomerID')->on('tblCustomer');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblContract');

		Schema::table('tblContract', function($table){
			$table->dropColumn('strCustomerID');
		});
	}

}
