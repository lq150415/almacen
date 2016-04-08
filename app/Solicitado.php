<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Solicitado extends Model {

	protected $table = 'solicitados';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['CAN_SOL','ID_PRO','ID_SOL'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}
