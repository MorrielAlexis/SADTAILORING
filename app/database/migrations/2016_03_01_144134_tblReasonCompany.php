<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonCompany', function(Blueprint $table){
			$table->string('strInactiveCompanyID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonCompany', function(Blueprint $table){

			$table->foreign('strInactiveCompanyID')->references('strCustCompanyID')->on('tblCustCompany');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReasonCompany');

		Schema::table('tblReasonCompany', function($table){
			$table->dropColumn('strInactiveCompanyID');
		});	}

}
