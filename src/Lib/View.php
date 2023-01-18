<?php

namespace CorePhpLms\Lib;

final class View
{
    use SingletonTrait;

    const VIEWS_PATH = __DIR__ . '/../../views/';
    const VIEWS_LAYOUT_PATH = self::VIEWS_PATH . 'layouts/';

    public static function render(
        string $path,
        array $data = [],
        string $layout = 'public',
    ): void {
        $data['content'] = self::VIEWS_PATH . $path . '.php';
        extract(self::setup_data($data));
        include(self::VIEWS_LAYOUT_PATH . $layout . '.php');
    }

    protected static function setup_data(array $data): array
    {
        $view_config = require_once(__DIR__ . '/../../config/views.php');
        return array_merge($data, $view_config['data']);
    }
}
