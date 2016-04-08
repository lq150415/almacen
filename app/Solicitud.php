<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model {

	
	protected $table = 'solicitudes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['ID_USU'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
