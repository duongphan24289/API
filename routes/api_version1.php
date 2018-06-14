<?php

$router->post('login', ['as' => 'login', 'uses' => 'LoginController@authentication']);
$router->group(['prefix' => 'users', 'middleware' => 'jwt-auth'], function($router){
	$router->get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
});