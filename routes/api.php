<?php

$router->group(['prefix' => 'v1', 'namespace' => 'V1'], function ($router) {
	require __DIR__ . '/api_version1.php';
});

/*
$router->group(['prefix' => 'v2', 'namespace' => 'V1'], function ($router) {
	require __DIR__ . '/api_version2.php';
});
*/