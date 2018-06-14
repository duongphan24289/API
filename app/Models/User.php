<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;

class User extends BaseModel implements AuthenticatableContract, JWTSubject{
	use Authenticatable;
	
	protected $table = 'users';
	
	protected $primaryKey = 'id';
	
	protected $fillable = [
		'id',
		'email',
		'password',
		'name',
		'created_at',
		'updated_at',
	];
	
	protected $hidden = [
		'created_at',
		'updated_at',
		'password',
	];
	
	public function getJWTIdentifier()
	{
		return $this->getKey();
	}
	
	public function getJWTCustomClaims()
	{
		return [];
	}
}