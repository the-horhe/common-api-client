<?php declare(strict_types=1);

namespace TheHorhe\ApiClient;

use GuzzleHttp\Psr7\Request;

/**
 * TODO: request builder interface
 * TODO: normalize headers?
 *
 * Class RequestBuilder
 * @package TheHorhe\ApiClient
 */
class RequestBuilder
{
    protected $headers = [];
    protected $queryParameters = [];
    protected $httpMethod;



    public function createRequest()
    {
        return $this->request;
    }

    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $name => $value) {
            $this->addHeader($name, $value);
        }

        return $this;
    }

    public function addQueryParameter($name, $value)
    {
        $this->queryParameters[$name] = $value;

        return $this;
    }
}