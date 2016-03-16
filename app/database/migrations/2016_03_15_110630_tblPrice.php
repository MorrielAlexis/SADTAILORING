<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPrice extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblPrice', function(Blueprint $table){
			$table->string('strJobOrderID')->index();
			$table->primary('strJobOrderID');//primary key
			$table->double('dblPricePerOrder');
			$table->datetime('dtDateAsOf');
			$table->boolean('boolIsActive');
			$table->timestamps();
		});

		Schema::table('tblPrice', function(Blueprint $table){
			$table->foreign('strJobOrderID')->references('strJobOrderID')->on('tblJobOrder');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblPrice');

		Schema::table('tblPrice', function($table){
			$table->dropColumn('strJobOrderID');
		});
	}

}
