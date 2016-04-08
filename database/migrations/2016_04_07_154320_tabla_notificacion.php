<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaNotificacion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notificaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('DES_NOT');
			$table->integer('AUT_NOT');
			$table->string('TIP_NOT', 100);
			$table->integer('REA_NOT'); // 0 or 1  
			$table->integer('ID_PSO')->unsigned();
			$table->foreign('ID_PSO')->references('id')->on('solicitudes');
			$table->timestamps();
			
		});
		Schema::create('solicitados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('CAN_SOL');
			$table->integer('ID_PRO')->unsigned();
			$table->foreign('ID_PRO')->references('id')->on('productos');
			$table->integer('ID_SOL')->unsigned();
			$table->foreign('ID_SOL')->references('id')->on('solicitudes');
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
