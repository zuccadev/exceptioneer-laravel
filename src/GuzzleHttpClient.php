<?php

namespace Zuccadev\ExceptioneerLaravel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
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

    public function send(Notification $notification, $endpoint)
    {
        $this->logger->debug('Sending exception to Exceptioneer...');

        try {
            $this->client->post($endpoint, ['json' => $notification->toArray()]);
            $this->logger->debug('Exception sent to Exceptioneer');
        }
        catch(ClientException $exception) {
            $this->logger->debug('Error while sending the exception to Exceptioneer');
        }
    }
}