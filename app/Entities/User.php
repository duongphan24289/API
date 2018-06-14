<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Model implements Transformable, AuthenticatableContract, JWTSubject
{
    use TransformableTrait, Authenticatable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
