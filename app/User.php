<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'hobbies', 'specialization', 'birth_date'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function scopeAdmins($query)
	{
		return $query->whereHas('roles', function($q){
			return $q->whereName('admin');
		});
	}

	public function scopeVolunteers($query)
	{
		return $query->whereHas('roles', function($q){
			return $q->whereName('volunteer');
		});
	}

	public function scopePlaysRole($query, $roles)
	{
		return $query->whereHas('roles', function($q) use($roles){
			return $q->whereIn('name', $roles);
		});
	}

	public function workGroups()
	{
		return $this->belongsToMany('\App\WorkGroup');
	}

}
