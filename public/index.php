<?php

// Autoload dependencies
require_once(__DIR__ . '/../vendor/autoload.php');

// Initialize configuration files
require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../config/routes.php');

use CorePhpLms\Lib\RouteDispatcher;

$request_method = $_SERVER['REQUEST_METHOD'] ?? null;
$request_uri = $_SERVER['REQUEST_URI'] ?? null;
$route_dispatcher = new RouteDispatcher();
$route_dispatcher->dispatch(strtolower($request_method), $request_uri, ['hey' => 'ho']);
