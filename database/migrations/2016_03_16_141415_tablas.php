<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tablas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('almacenes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('NOM_ALM',100);
			$table->string('UBI_ALM',100);
			$table->timestamps();
			
		});

		Schema::create('rubros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('NOM_RUB',100);
			$table->integer('CPR_RUB');
			$table->integer('ID_ALM')->unsigned();
			$table->foreign('ID_ALM')->references('id')->on('almacenes');
			$table->timestamps();
		});
	
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ITM_PRO');
			$table->text('DES_PRO');
			$table->float('PUN_PRO');
			$table->integer('CAN_PRO');
			$table->integer('ID_RUB')->unsigned();
			$table->foreign('ID_RUB')->references('id')->on('rubros');
			$table->timestamps();
			
		});
		Schema::create('ingresos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('FEC_ING');
			$table->integer('NFC_ING');
			$table->integer('NOC');
			$table->integer('CAN_ING');
			$table->text('PRO_ING');
			$table->integer('ID_PRO')->unsigned();
			$table->foreign('ID_PRO')->references('id')->on('productos');
			$table->integer('ID_USU')->unsigned();
			$table->foreign('ID_USU')->references('id')->on('users');
			$table->timestamps();
			
		});
		Schema::create('solicitudes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('FEC_SOL');
			$table->integer('EST_SOL');
			$table->integer('ID_USU')->unsigned();
			$table->foreign('ID_USU')->references('id')->on('users');
		});
		Schema::create('productos_solicitados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('CAN_PRS');
			$table->integer('ID_SOL')->unsigned();
			$table->foreign('ID_SOL')->references('id')->on('solicitudes');;
			$table->integer('ID_PRO')->unsigned();
			$table->foreign('ID_PRO')->references('id')->on('productos');
			$table->timestamps();
			
		});
		Schema::create('registros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('FEC_REG');
			$table->string('ACC_REG',45);
			$table->text('DES_REG');
			$table->integer('ID_USU')->unsigned();
			$table->foreign('ID_USU')->references('id')->on('users');
		});
		Schema::create('respuestas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('RES_RES');
			$table->dateTime('FEC_RES');
			$table->integer('ID_USU')->unsigned();
			$table->foreign('ID_USU')->references('id')->on('users');
			$table->integer('ID_SOL')->unsigned();
			$table->foreign('ID_SOL')->references('id')->on('solicitudes');
			$table->timestamps();
			
		});
		
		Schema::create('salidas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('FEC_SAL');
			$table->integer('DGA_SAL');
			$table->text('DES_SAL');
			$table->integer('CAN_SAL');
			$table->integer('ID_PRO')->unsigned();
			$table->foreign('ID_PRO')->references('id')->on('productos');
			$table->integer('ID_USU')->unsigned();
			$table->foreign('ID_USU')->references('id')->on('users');
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
