<?php

namespace CorePhpLms\Lib;

use BadMethodCallException;

final class Router extends Singleton
{
    private static array $methods = [
        'delete',
        'get',
        'patch',
        'post',
        'put',
    ];
    private static array $routes = [];

    public static function __callStatic(string $method_name, array $args)
    {
        $uri = $args[0] ?? null;
        $controller = $args[1] ?? null;

        if (
            !in_array($method_name, self::$methods) ||
            is_null($uri) ||
            is_null($controller)
        ) {
            throw new BadMethodCallException(sprintf(
                'Method %s with uri %s does not exist',
                $method_name,
                $uri,
            ));
        }

        self::_add_route($method_name, $uri, $controller);
    }

    public static function get_route(string $route_name)
    {
        if (array_key_exists($route_name, self::$routes)) {
            return self::$routes[$route_name];
        }
    }

    private static function _add_route(
        string $method,
        string $uri,
        string|callable $controller_name,
    ): void {
        self::$routes[$uri] = [$controller_name, $method];
    }
}
