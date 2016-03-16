<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblJobOrderGarment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblJobOrder_Garment', function(Blueprint $table){
			$table->string('strJobOrderID')->index();//fk
			$table->string('strCategoryID')->index();//fk
			$table->string('strSegmentID')->index();//fk
			$table->primary('strJobOrderID', 'strCategoryID', 'strSegmentID');//primary keys
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblJobOrder_Garment', function(Blueprint $table){
			$table->foreign('strJobOrderID')->references('strJobOrderID')->on('tblJobOrder');
			$table->foreign('strCategoryID')->references('strGarmentCategoryID')->on('tblGarmentCategory');
			$table->foreign('strSegmentID')->references('strGarmentSegmentID')->on('tblGarmentSegment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblJobOrder_Garment');

		Schema::table('tblJobOrder_Garment', function($table){
			$table->dropColumn('strJobOrderID');
			$table->dropColumn('strCategoryID');
			$table->dropColumn('strSegmentID');
		});
	}

}
