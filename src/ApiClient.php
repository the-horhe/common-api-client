<?php declare(strict_types=1);

namespace TheHorhe\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use function GuzzleHttp\Psr7\try_fopen;
use Psr\Http\Message\RequestInterface;

/**
 * TODO: ApiClientInterface
 *
 * Class ApiClient
 * @package TheHorhe\ApiClient
 */
class ApiClient
{
    /**
     * @param MethodInterface $method
     * @return mixed
     */
    public function executeMethod(MethodInterface $method)
    {
        $client = $this->createClient();

        $request = $this->buildRequest($method);
        $response = $client->send($request);

        try {
            $result = $method->processResponse($response);
            return $result;
        } catch (\Throwable $exception) {
            $method->handleException($exception);
        }
    }

    /**
     * TODO: Method body
     * Parameters: Get -> query / Post -> body
     *
     * @param MethodInterface $method
     * @return RequestInterface
     */
    protected function buildRequest(MethodInterface $method)
    {
        $request = new Request(
            $method->getHttpMethod(),
            sprintf('%s://%s/%s', $method->getHost(), $method->getScheme(), $method->getMethodUrl()),
            $method->getHeaders()
        );

        return $request;
    }

    /**
     * @return Client
     */
    protected function createClient()
    {
        return new Client();
    }
}