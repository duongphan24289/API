<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	
	public function __construct()
	{}
	
	public function authentication(Request $request){
		try {
			$params = $request->only(['email', 'password']);
			if(! $token = Auth::attempt($params)){
				return $this->error('Email or password is wrong.', 401);
			}
			
			return $this->success([
				'status' => true,
				'token' => $token,
				'expired_at' => Carbon::now()->addMinutes(config('jwt.ttl'))->toDateTimeString()
			]);
		}
		catch (\Exception $e){
			Log::error('API_AUTHENTICATION_ERROR <=> ' . $e->getMessage());
			
			return $this->error('Server error. Please contact for support.', 500);
		}
	}
}