<?php

namespace CorePhpLms\Lib;

class Singleton
{
    private static ?self $instance = null;

    private function __construct()
    {
        return self::get_instance();
    }

    public static function get_instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
