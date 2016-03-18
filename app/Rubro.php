<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model {

	protected $table = 'rubros';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NOM_RUB','CPR_RUB','DES_RUB','ID_ALM'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}

