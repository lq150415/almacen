<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model {
protected $table = 'almacenes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NOM_ALM','UBI_ALM'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded =['id'];
}