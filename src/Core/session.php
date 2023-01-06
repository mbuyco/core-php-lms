<?php

interface ISessionManager
{
    public function clear(): void;
    public function get(string $key);
    public function has(string $key): bool;
    public function remove(string $key): void;
    public function set(string $key, $value): self;
}

class SessionManager implements ISessionManager
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function clear(): void
    {
        session_unset();
    }

    public function get(string $key)
    {
        if (!$this->has($key)) {
            return NULL;
        }
        return $_SESSION[$key];
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    public function remove(string $key): void
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function set(string $key, $value): SessionManager
    {
        if (!$this->has($key)) {
            $_SESSION[$key] = $value;
        }
        return $this;
    }
}
