<?php

namespace Spescina\Exceptioneer;


use Noodlehaus\Config;

class Exceptioneer
{
    protected $client;

    protected $parser;

    protected $configLoader;

    protected $config;

    public function __construct(Client $client, Parser $parser, Config $configLoader)
    {
        $this->client = $client;

        $this->parser = $parser;

        $this->configLoader = $configLoader;
    }

    public function report(\Exception $e)
    {
        $apiKey = $this->getApiKey();

        $notification = $this->parser->createNotification($e, $stage, $apiKey);

        $this->client->send($notification);
    }

    protected function getApiKey()
    {
        return $this->configLoader->get('apiKey');
    }
}