<?php namespace almacen;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['NOM_USU','APA_USU','AMA_USU','ARE_USU','CAR_USU','CI_USU','NIV_USU','password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	protected $guarded =['id'];
}
