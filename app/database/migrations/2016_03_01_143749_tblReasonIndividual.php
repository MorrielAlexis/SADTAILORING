<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonIndividual extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonIndividual', function(Blueprint $table){
			$table->string('strInactiveIndividualID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonIndividual', function(Blueprint $table){

			$table->foreign('strInactiveIndividualID')->references('strCustPrivIndivID')->on('tblCustPrivateIndividual');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('TblReasonIndividual');

		Schema::table('TblReasonIndividual', function($table){
			$table->dropColumn('strInactiveIndividualID');
		});
	}

}
