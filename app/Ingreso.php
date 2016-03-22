<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model {

protected $table = 'ingresos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['FEC_ING','ID_USU'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];

}
