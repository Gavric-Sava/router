<?php

namespace Logeecom\Router;

interface RequestInterface
{

    /**
     * Gets instance of singleton RequestInterface.
     *
     * @return RequestInterface
     */
    public static function getInstance(): RequestInterface;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return string
     */
    public function getPath(): string;

//    /**
//     * @return array
//     */
//    public function getHeaders(): array;
//
//    /**
//     * @return array
//     */
//    public function getPathParameters(): array;

    /**
     * @param array $pathParameters
     */
    public function setPathParameters(array $pathParameters): void;

//    /**
//     * Gets query parameter under given key.
//     *
//     * @param string $key
//     * @return mixed
//     */
//    public function getQueryParameter(string $key): mixed;
//
//    /**
//     * Gets body data under given key.
//     *
//     * @param string $key
//     * @return mixed
//     */
//    public function getBodyData(string $key): mixed;
//
//    /**
//     * @return string - HTTP host name.
//     */
//    public function getHost(): string;
//
//    /**
//     * @return string - Scheme of the request.
//     */
//    public function getScheme(): string;

}