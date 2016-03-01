<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReasonCatalogue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblReasonCatalogue', function(Blueprint $table){
			$table->string('strInactiveCatalogueID')->primary();
			$table->string('strInactiveReason')->nullable()->change();
			$table->timestamps();
		});


		Schema::table('TblReasonCatalogue', function(Blueprint $table){

			$table->foreign('strInactiveCatalogueID')->references('strCatalogueID')->on('tblCatalogue');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */


	public function down()
	{
		Schema::dropIfExists('TblReasonCatalogue');

		Schema::table('TblReasonCatalogue', function($table){
			$table->dropColumn('strInactiveCatalogueID');
		});
	}

}
