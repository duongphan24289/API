<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTAuthMiddleware extends BaseMiddleware {
	
	public function handle($request, Closure $next){
		
		if(! $token = $this->auth->setRequest($request)->getToken()){
			return response()->json([
				'status' => false,
				'message' => 'Token not provided'
			], 400);
		}
		try {
			$this->auth->authenticate($token);
		}
		catch (TokenExpiredException $e){
			return response()->json([
				'status' => false,
				'message' => 'Token expired.'
			], 401);
		}
		catch (JWTException $e){
			Log::error('Token invalid => ' . $e->getMessage());
			
			return response()->json([
				'status' => false,
				'message' => 'Token is invalid'
			], 404);
		}
		
		return $next($request);
	}
}