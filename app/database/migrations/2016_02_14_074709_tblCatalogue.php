<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class tblCatalogue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblCatalogue', function(Blueprint $table){
			$table->string('strCatalogueID')->primary();
			$table->string('strCatalogueCategory')->index();
			$table->string('strCatalogueName');
			$table->string('strCatalogueDesc', 255)->nullable()->change();
			$table->string('strCatalogueImage')->nullable()->change();
			$table->boolean('boolIsActive');
			$table->timestamps();
		});


		Schema::table('tblCatalogue', function(Blueprint $table){

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
		Schema::dropIfExists('tblCatalogue');

		Schema::table('tblCatalogue', function($table){
			$table->dropColumn('strCatalogueCategory');
		});
	}

}
