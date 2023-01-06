<?php

namespace CorePhpLms\Lib;

interface IRouteDispatcher
{
    public function dispatch(string $method, string $uri, array $params): void;
}
