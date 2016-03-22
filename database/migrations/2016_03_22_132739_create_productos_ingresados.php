<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosIngresados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ingresados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('NFC_PIN');
			$table->integer('NOC_PIN');
			$table->integer('CAN_PIN');
			$table->integer('ID_PRO')->unsigned();
			$table->foreign('ID_PRO')->references('id')->on('productos');
			$table->integer('ID_ING')->unsigned();
			$table->foreign('ID_ING')->references('id')->on('ingresos');
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
		//
	}

}
