<?php

namespace Spescina\Exceptioneer;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GuzzleHttpClient implements HttpClientInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send($e)
    {
        $response = $this->client->post(config('exceptioneer.endpoint'), ['json' => ['foo' => 'bar']]);

        dd($response->getBody());
    }
}