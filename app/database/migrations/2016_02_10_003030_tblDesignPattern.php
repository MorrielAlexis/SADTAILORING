<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDesignPattern extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblDesignPattern', function(Blueprint $table){
			$table->string('strDesignPatternID')->primary();
			$table->string('strSegment');//fk
			$table->string('strPatternName');
			$table->text('txtPatternImage');
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
		Schema::dropIfExists('tblDesignPattern');
	}

}
