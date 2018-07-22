<?php declare(strict_types=1);

namespace TheHorhe\ApiClient;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;

/**
 * TODO: ApiClientInterface
 *
 * Class ApiClient
 * @package TheHorhe\ApiClient
 */
class ApiClient
{
    public function executeMethod(MethodInterface $method)
    {
        $client = $this->createClient();

        $request = $this->buildRequest($method);
        $response = $client->send($request);

        return $method->processResponse($response);

        # execute request
        # process response
        # handle exception
    }

    /**
     * @param MethodInterface $method
     * @return RequestInterface
     */
    protected function buildRequest(MethodInterface $method)
    {

    }

    /**
     * @return Client
     */
    protected function createClient()
    {
        return new Client();
    }

    /**
     * @return RequestBuilder
     */
    protected function getRequestBuilder()
    {
        return new RequestBuilder();
    }
}