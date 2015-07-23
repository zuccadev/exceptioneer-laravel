<?php

namespace Zuccadev\ExceptioneerLaravel;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GuzzleHttpClient implements HttpClientInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send(Notification $notification, $endpoint)
    {
        $this->client->post($endpoint, ['json' => $notification->toArray()]);
    }
}