<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
	protected $table = 'productos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['ITM_PRO','DES_PRO','PUN_PRO','CAN_PRO','ID_RUB'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
