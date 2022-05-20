<?php

namespace Logeecom\Router;

/**
 * Contains mapping of request method and path into a middleware chain
 * with the appropriate controller and it's method at the end.
 */
class RouteMapping
{

    /**
     * @var string - HTTP method regex.
     */
    private string $requestMethodPattern;
    /**
     * @var string - HTTP path regex.
     */
    private string $requestPathPattern;
    /**
     * @var string - Fully qualified controller name.
     */
    private string $controllerClassName;
    /**
     * @var string - Controller method name.
     */
    private string $controllerMethodName;
    /**
     * @var array - List of fully middleware class names.
     * They will be called in the order of declaration.
     */
    private array $middlewareClassNames;

    /**
     * @param string $requestMethodPattern
     * @param string $requestPathPattern
     * @param string $controllerClassName
     * @param string $controllerMethodName
     * @param array $middlewareClassNames
     */
    public function __construct(
        string $requestMethodPattern,
        string $requestPathPattern,
        string $controllerClassName,
        string $controllerMethodName,
        array $middlewareClassNames
    )
    {
        $this->requestMethodPattern = $requestMethodPattern;
        $this->requestPathPattern = $requestPathPattern;
        $this->controllerClassName = $controllerClassName;
        $this->controllerMethodName = $controllerMethodName;
        $this->middlewareClassNames = $middlewareClassNames;
    }

    /**
     * Checks if route mapping matches with given HTTP request method and path.
     *
     * @param string $requestMethod
     * @param string $requestPath
     * @return bool
     */
    public function matches(string $requestMethod, string $requestPath): bool
    {
        return (
            preg_match($this->requestMethodPattern, $requestMethod)
            &&
            preg_match($this->requestPathPattern, $requestPath)
        );
    }

    /**
     * Parses and returns path parameters from request.
     *
     * @param string $requestPath
     * @return array
     */
    public function parsePathParameters(string $requestPath): array
    {
        $pathParameters = [];
        preg_match($this->requestPathPattern, $requestPath, $pathParameters);
        array_shift($pathParameters);

        return $pathParameters;
    }

    /**
     * @return string
     */
    public function getRequestMethodPattern(): string
    {
        return $this->requestMethodPattern;
    }

    /**
     * @return string
     */
    public function getRequestPathPattern(): string
    {
        return $this->requestPathPattern;
    }

    /**
     * @return string
     */
    public function getControllerClassName(): string
    {
        return $this->controllerClassName;
    }

    /**
     * @return string
     */
    public function getControllerMethodName(): string
    {
        return $this->controllerMethodName;
    }

    /**
     * @return array
     */
    public function getMiddlewareClassNames(): array
    {
        return $this->middlewareClassNames;
    }

}