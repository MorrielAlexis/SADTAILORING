<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonCompany', function(Blueprint $table){
			$table->string('strInactiveCompanyID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonCompany', function(Blueprint $table){

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
		Schema::dropIfExists('TblReasonCompany');

		Schema::table('TblReasonCompany', function($table){
			$table->dropColumn('strInactiveCompanyID');
		});	}

}
