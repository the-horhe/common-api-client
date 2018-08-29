<?php declare(strict_types=1);

namespace TheHorhe\ApiClient\Example\Cats\Method;

use Psr\Http\Message\ResponseInterface;
use TheHorhe\ApiClient\Example\Cats\Exception\CatException;
use TheHorhe\ApiClient\MethodInterface;

class GetImages implements MethodInterface
{
    protected $resultsPerPage = 10;

    /**
     * GetImages constructor.
     * @param int $resultsPerPage
     */
    public function __construct($resultsPerPage)
    {
        $this->resultsPerPage = $resultsPerPage;
    }

    public function getHeaders()
    {
        return [];
    }

    public function getQueryParameters()
    {
        return [
            'format' => 'xml',
            'results_per_page' => $this->resultsPerPage
        ];
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getScheme()
    {
        return 'https';
    }

    public function getHost()
    {
        return 'thecatapi.com';
    }

    public function getMethodUrl()
    {
        return '/api/images/get';
    }

    public function processResponse(ResponseInterface $response)
    {
        return $response->getBody()->getContents();
    }

    public function handleException(\Throwable $exception)
    {
        throw new CatException($exception->getMessage(), $exception->getCode(), $exception);
    }

}