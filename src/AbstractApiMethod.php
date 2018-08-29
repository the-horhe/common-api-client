<?php

namespace TheHorhe\ApiClient;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractApiMethod implements MethodInterface
{
    public function getHeaders()
    {
        return [];
    }

    public function getQueryParameters()
    {
        return [];
    }

    public function getPostFields()
    {
        return [];
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getScheme()
    {
        return 'https';
    }

    abstract public function getHost();


    abstract public function getMethodUrl();

    public function processResponse(ResponseInterface $response)
    {
        return $response;
    }

    public function handleException(\Throwable $exception)
    {
        throw $exception;
    }

}