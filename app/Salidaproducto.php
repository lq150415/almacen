<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Salidaproducto extends Model {

	protected $table = 'salidaproductos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['DGA_SPR','CAN_SPR','DES_SPR','ID_PRO','ID_SAL'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];


}
