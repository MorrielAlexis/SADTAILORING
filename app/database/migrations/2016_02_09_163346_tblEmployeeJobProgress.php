<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEmployeeJobProgress extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblEmployeeJobProgress', function(Blueprint $table){
			$table->string('strEmpJobProgressID')->primary();
			$table->string('strOrder');//fk
			$table->integer('intJobProgress');//fk
			$table->string('strEmpID');//fk
			$table->datetime('dtAsOf');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblEmployeeJobProgress');
	}

}
