<?php

namespace CorePhpLms\Lib;

final class View
{
    use SingletonTrait;

    public static function render(string $view_path, array $data = []): void
    {
        extract(self::setup_data($data));
        include(__DIR__ . '/../../views/' . $view_path . '.php');
    }

    protected static function setup_data(array $data): array
    {
        $view_config = require_once(__DIR__ . '/../../config/views.php');
        return array_merge($data, $view_config['data']);
    }
}
