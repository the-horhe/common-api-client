<?php declare(strict_types=1);

namespace TheHorhe\ApiClient;



use Psr\Http\Message\ResponseInterface;

interface MethodInterface
{
    /**
     * @return array
     */
    function getHeaders();

    /**
     * @return array
     */
    function getQueryParameters();

    /**
     * @return string
     */
    function getHttpMethod();

    /**
     * @return string
     */
    function getUrl();

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    function processResponse(ResponseInterface $response);

    /**
     * @param \Exception $exception
     * @return mixed
     */
    function handleException(\Exception $exception);
}