<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblJobProgressDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblJobProgressDetail', function(Blueprint $table){
			$table->integer('intJobProgressID')->primary();
			$table->string('strJobProgressName');
			$table->text('txtJobProgressDesc');
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
		Schema::dropIfExists('tblJobProgressDetail');
	}

}
