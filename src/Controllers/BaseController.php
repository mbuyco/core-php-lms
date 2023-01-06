<?php

namespace CorePhpLms\Controllers;

use BadMethodCallException;

abstract class BaseController
{
    public function __call(string $method, array $parameters)
    {
        if (!property_exists($this, $method)) {
            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.',
                static::class,
                $method
            ));
        }
        return $this->{$method}(...array_values($parameters));
    }
}
