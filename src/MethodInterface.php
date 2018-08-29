<?php declare(strict_types=1);

namespace TheHorhe\ApiClient;

use Psr\Http\Message\ResponseInterface;

interface MethodInterface
{
    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return array
     */
    public function getQueryParameters();

    /**
     * @return array
     */
    public function getPostFields();

    /**
     * GET/POST
     *
     * @return string
     */
    public function getHttpMethod();

    /**
     * http/https
     *
     * @return string
     */
    public function getScheme();

    /**
     * @return string
     */
    public function getHost();

    /**
     * @return string
     */
    public function getMethodUrl();

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function processResponse(ResponseInterface $response);

    /**
     * @param \Throwable $exception
     * @return mixed
     */
    public function handleException(\Throwable $exception);
}