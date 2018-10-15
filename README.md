# Common API client
### What is this for?
Tiny-tiny guzzle wrapper that helps to painlessly integrate different API's in your project.

### Core idea
One API method = one class to describe and handle it

### Suggested use cases
You need to integrate several services with only few method used.

### Usage
1. Create class that represents your method
~~~
<?php

namespace App\Api\Cats\Method;

use Psr\Http\Message\ResponseInterface;
use TheHorhe\ApiClient\AbstractApiMethod;
use TheHorhe\ApiClient\MethodInterface;

class GetImages extends AbstractApiMethod
{
    protected $resultsPerPage = 10;

    /**
     * GetImages constructor.
     * @param int $resultsPerPage
     */
    public function __construct(int $resultsPerPage)
    {
        $this->resultsPerPage = $resultsPerPage;
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
        throw new \Exception($exception->getMessage(), $exception->getCode(), $exception);
    }

}
~~~

2. Use client to execute your method
~~~
...
use TheHorhe\ApiClient\ApiClient;
use App\Api\Cats\Method\GetImages;
...

$client = new ApiClient();
$method = new GetImages(5);

try {
    $result = $client->executeMethod($method);
} catch (\Throwable $throwable) {
    // Process excrption
}
~~~

For more examples see Example directory

#### TODO:
1) Smart request building (post fields, files etc)
2) Tests
3) Separate package for symfony integration

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/the-horhe/common-api-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/the-horhe/common-api-client/?branch=master)
