<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Ingresado extends Model {

	protected $table = 'ingresados';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NFC_PIN','NOC_PIN','CAN_PIN','PRO_PIN','ID_PRO','ID_ING'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];


}
