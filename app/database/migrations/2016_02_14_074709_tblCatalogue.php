<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCatalogue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TblCatalogue', function(Blueprint $table){
			$table->string('strCatalogueID')->primary();
			$table->string('strCatalogueCategory')->index();
			$table->string('strCatalogueName');
			$table->string('strCatalogueDesc', 255);
			$table->string('strCatalogueImage');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});


		Schema::table('TblCatalogue', function(Blueprint $table){

			$table->foreign('strCatalogueCategory')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */


	public function down()
	{
		Schema::dropIfExists('TblCatalogue');

		Schema::table('TblCatalogue', function($table){
			$table->dropColumn('strCatalogueCategory');
		});
	}

}
