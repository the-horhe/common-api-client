# Common API client
### What is this for?
Tiny-tiny guzzle wrapper that helps to painlessly integrate different API's in your project.

### Core idea
One API method = one class to describe and handle it

### Suggested use cases
You need to integrate several API's with only few method used.

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
    // Process exception
}
~~~

For more examples see Example directory

3. Timeout, files, form-data: use getOptions() method in your api method class.
[Guzzle docs](http://docs.guzzlephp.org/en/stable/quickstart.html#post-form-requests).

For example:
~~~
    // Sending form fields + timeout
    public function getOptions()
    {

        return [
            'timeout' => 5,
            'form_params' => [
                'name' => 'Horhe',
                'surname' => 'Secret ^_^'
            ]
        ];
    }
    
    // Form with files
    public function getOptions()
    {
        return [
            'multipart' => [
                [
                    'name'     => 'field_name',
                    'contents' => 'field_value'
                ],
                [
                    'name'     => 'file_name',
                    'contents' => fopen('/path/to/file', 'r')
                ],
            ]
        ];
    }
~~~

#### TODO:
1) Tests
2) Separate package for symfony integration
3) Guzzle middleware support

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/the-horhe/common-api-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/the-horhe/common-api-client/?branch=master)
