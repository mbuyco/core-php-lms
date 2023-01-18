<?php

namespace CorePhpLms\Controllers;

use CorePhpLms\Services\LoginService;

class LoginController extends BaseController
{
    private LoginService $login_service;

    public function __construct()
    {
        $this->login_service = new LoginService();
    }

    public function post(array $params)
    {
        $this->login_service->login('hey', 'hey');
    }
}
