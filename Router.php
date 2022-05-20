<?php

namespace Logeecom\Router;

use Exception;

/**
 * Router class. Specifies which controller calls which function for the received request.
 */
class Router
{

    /**
     * Array of routes.
     *
     * @var RouteMapping[]
     */
    private array $routeMappings;

    /**
     * @throws Exception
     */
    public function __construct(string $routeMappingConfigPath)
    {
        $mappings = include $routeMappingConfigPath;

        foreach ($mappings as $mapping) {
            $this->routeMappings[] = new RouteMapping(
                $mapping[RouteMappingKey::REQUEST_HTTP_METHOD],
                $mapping[RouteMappingKey::REQUEST_PATH],
                $mapping[RouteMappingKey::CONTROLLER_CLASS_NAME],
                $mapping[RouteMappingKey::CONTROLLER_METHOD_NAME],
                $mapping[RouteMappingKey::MIDDLEWARE_CLASS_NAMES],
            );
        }
    }

    /**
     * Resolves appropriate route mapping for the received request.
     *
     * @param RequestInterface $request - Received client HTTP request.
     * @return RouteMapping|null
     * @throws Exception
     */
    public function resolveRouteMapping(RequestInterface $request): ?RouteMapping
    {
        $requestMethod = $request->getMethod();
        $requestPath = $request->getPath();

        foreach ($this->routeMappings as $routeMapping) {
            if ($routeMapping->matches($requestMethod, $requestPath)) {
                $request->setPathParameters($routeMapping->parsePathParameters($requestPath));

                return $routeMapping;
            }
        }

        return null;
    }

}