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
        $this->preprocessMethod($method);

        $client = $this->createClient();
        $request = $this->buildRequest($method);

        try {
            $response = $client->send($request, [
                'timeout' => $method->getTimeout()
            ]);
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
        $parameters = http_build_query($method->getQueryParameters());

        $request = new Request(
            $method->getHttpMethod(),
            sprintf('%s://%s%s?%s', $method->getScheme(), $method->getHost(), $method->getMethodUrl(), $parameters),
            $method->getHeaders(),
            $method->getRawBody()
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

    /**
     * Methods allows add some common operations, e.g. add body parameter to the body of all methods executed by this client.
     *
     * @param MethodInterface $method
     */
    protected function preprocessMethod(MethodInterface $method)
    {
        return;
    }
}