<?php

namespace CorePhpLms\Lib;

trait SingletonTrait
{
    private static $instance = null;

    private function __construct()
    {
        return static::get_instance();
    }

    public static function get_instance(): static
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
