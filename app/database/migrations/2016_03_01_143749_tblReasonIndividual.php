<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblReasonIndividual extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReasonIndividual', function(Blueprint $table){
			$table->string('strInactiveIndividualID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('tblReasonIndividual', function(Blueprint $table){

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
		Schema::dropIfExists('tblReasonIndividual');

		Schema::table('tblReasonIndividual', function($table){
			$table->dropColumn('strInactiveIndividualID');
		});
	}

}
