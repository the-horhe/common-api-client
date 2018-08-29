<?php

namespace TheHorhe\ApiClient;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class AbstractApiMethod implements MethodInterface
{
    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    public function getQueryParameters()
    {
        // TODO: Implement getQueryParameters() method.
    }

    public function getPostFields()
    {
        // TODO: Implement getPostFields() method.
    }

    public function getHttpMethod()
    {
        // TODO: Implement getHttpMethod() method.
    }

    public function getScheme()
    {
        // TODO: Implement getScheme() method.
    }

    public function getHost()
    {
        // TODO: Implement getHost() method.
    }

    public function getMethodUrl()
    {
        // TODO: Implement getMethodUrl() method.
    }

    public function processResponse(ResponseInterface $response)
    {
        // TODO: Implement processResponse() method.
    }

    public function handleException(\Throwable $exception)
    {
        // TODO: Implement handleException() method.
    }

}