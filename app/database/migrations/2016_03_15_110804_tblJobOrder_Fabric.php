<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblJobOrderFabric extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblJobOrder_Fabric', function(Blueprint $table){
			$table->string('strOrderID')->index();//fk
			$table->string('strFabricSwatch')->index();//fk
			$table->primary('strOrderID', 'strFabricSwatch');//primary keys
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblJobOrder_Fabric', function(Blueprint $table){
			$table->foreign('strOrderID')->references('strJobOrderID')->on('tblJobOrder');
			$table->foreign('strFabricSwatch')->references('strSwatchID')->on('tblSwatches');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblJobOrder_Fabric');

		Schema::table('tblJobOrder_Fabric', function($table){
			$table->dropColumn('strOrderID');
			$table->dropColumn('strFabricSwatch');
		});
	}

}
