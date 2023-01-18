<?php

namespace CorePhpLms\Services;

class LoginService
{
    public function login(string $username, string $password): void
    {
        echo $username . ' -- ' . $password;
    }

    private function _validate(string $username, string $password): bool
    {

    }
}
