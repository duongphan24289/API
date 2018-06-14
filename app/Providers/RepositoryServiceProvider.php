<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
//		$this->app->register(UserRepository::class, UserRepositoryEloquent::class);
		$this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
	}
	
}