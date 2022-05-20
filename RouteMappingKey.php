<?php

namespace Logeecom\Router;

/**
 * Route mapping array key constants.
 */
abstract class RouteMappingKey
{
    public const REQUEST_HTTP_METHOD = 'HTTP_METHOD';
    public const REQUEST_PATH = 'REQUEST_PATH';
    public const CONTROLLER_CLASS_NAME = 'CONTROLLER_NAME';
    public const CONTROLLER_METHOD_NAME = 'METHOD_NAME';
    public const MIDDLEWARE_CLASS_NAMES = 'MIDDLEWARE';
}