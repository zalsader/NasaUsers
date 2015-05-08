<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkGroup extends Model {

	protected $fillable = ['name', 'description'];

	public function users()
	{
		return $this->belongsToMany('\App\User');
	}

	public function admins()
	{
		return $this->users()->admins();
	}

	public function volunteers()
	{
		return $this->users()->volunteers();
	}

}
