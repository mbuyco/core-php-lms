<?php

use CorePhpLms\Controllers\LoginController;
use CorePhpLms\Controllers\PublicController;
use CorePhpLms\Lib\Router;

Router::get('/', PublicController::class);
Router::post('/', LoginController::class);
