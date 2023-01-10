<?php

namespace CorePhpLms\Lib;

use BadMethodCallException;
use Exception;

class RouteDispatcher implements IRouteDispatcher
{
    public function dispatch(
        string $method,
        string $uri,
        array $params = [],
    ): void {
        $route = Router::get_route($uri) ?? null;

        if (is_null($route)) {
            http_response_code(404);
            throw new Exception(sprintf(
                'Route %s with uri %s does not exist',
                $method,
                $uri,
            ));
        }

        $controller_name = $route[0] ?? null;

        if (is_null($controller_name)) {
            http_response_code(403);
            throw new BadMethodCallException(sprintf(
                'Controller for route %s %s does not exist',
                $method,
                $uri,
            ));
        }

        $this->_handle_dispatch($controller_name, $method, $params);
    }

    private function _handle_dispatch(
        string|callable $controller,
        string $method,
        array $params,
    ): void {
        if (is_string($controller)) {
            $controller = new $controller();
            $controller->{$method}($params);
        } else if (is_callable($controller)) {
            $controller($params);
        }
    }
}
