<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model {

protected $table = 'salidas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['FEC_SAL','ID_USU'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];


}
