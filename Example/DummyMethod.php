<?php

namespace TheHorhe\ApiClient\Example;

use Psr\Http\Message\ResponseInterface;
use TheHorhe\ApiClient\MethodInterface;

/**
 * If you are lazy to create infrastructure.
 * All configurable method parameters just passed as array.
 * Recommended for test purposes only.
 */
class DummyMethod implements MethodInterface
{

    protected $parameters;

    public function __construct(array $parameres)
    {
        $this->parameters = $parameres;
    }

    public function getHeaders()
    {
        return $this->parameters['headers'] ?? [];
    }

    public function getQueryParameters()
    {
        return $this->parameters['query_parameters'] ?? [];
    }

    public function getHttpMethod()
    {
        return $this->parameters['http_method'] ?? 'POST';
    }

    public function getScheme()
    {
        return $this->parameters['scheme'] ?? 'https';
    }

    public function getHost()
    {
        return $this->parameters['host'] ?? '';
    }

    public function getMethodUrl()
    {
        return $this->parameters['method_url'] ?? '';
    }

    public function processResponse(ResponseInterface $response)
    {
        return $response;
    }

    public function handleException(\Throwable $exception)
    {
        throw $exception;
    }

    public function getPostFields()
    {
        return [];
    }


}