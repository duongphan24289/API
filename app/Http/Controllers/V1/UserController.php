<?php
namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use App\Services\User as UserService;

class UserController extends Controller {
	
	protected $userService;
	
	public function __construct()
	{
		$this->userService = app(UserService::class);
	}
	
	public function profile(){
		try {
			$user = JWTAuth::parseToken()->authenticate();
			
			return $this->success($user);
		}
		catch (\Exception $e){
			Log::error('API_PROFILE_ERROR <=> ' . $e->getMessage());
			
			return $this->error('Server error. Please contact for support.', 500);
		}
	}
}