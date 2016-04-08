<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model {

		protected $table = 'notificaciones';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['DES_NOT','AUT_NOT','TIP_NOT','REA_NOT','ID_RUB','created_at','updated_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];

}
