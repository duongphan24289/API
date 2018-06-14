<?php

namespace App\Services;

use App\Repositories\UserRepository;

class User {
	
	protected $validator;
	
	protected $userRepository;
	
	public function __construct()
	{
		$this->userRepository = app(UserRepository::class);
	}
	
	// TODO
}