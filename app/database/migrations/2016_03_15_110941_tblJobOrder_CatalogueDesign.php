<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblJobOrderCatalogueDesign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblJobOrder_CatalogueDesign', function(Blueprint $table){
			$table->string('strJobOrderID')->index();//fk
			$table->string('strCatDesignID')->index();//fk
			$table->primary('strJobOrderID', 'strCatDesignID');//primary keys
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblJobOrder_CatalogueDesign', function(Blueprint $table){
			$table->foreign('strJobOrderID')->references('strJobOrderID')->on('tblJobOrder');
			$table->foreign('strCatDesignID')->references('strCatalogueID')->on('tblCatalogue');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblJobOrder_CatalogueDesign');

		Schema::table('tblJobOrder_CatalogueDesign', function($table){
			$table->dropColumn('strJobOrderID');
			$table->dropColumn('strCatDesignID');
		});
	}

}
