<?php

namespace Spescina\Exceptioneer;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class GuzzleHttpClient implements HttpClientInterface
{
    protected $client;

    private $logger;

    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function send(Notification $notification)
    {
        $promise = $this->client->postAsync(config('exceptioneer.endpoint'), ['json' => $notification->toArray()]);

        $promise->then(function (ResponseInterface $res) {
            $this->logger->debug('Exception sent to Exceptioneer');
        }, function (RequestException $e) {
            $this->logger->warning('Error while sending the exception to Exceptioneer');
        });
    }
}