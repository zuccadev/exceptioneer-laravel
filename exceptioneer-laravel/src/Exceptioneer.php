<?php

namespace Zuccadev\ExceptioneerLaravel;

class Exceptioneer
{
    protected $client;

    protected $parser;

    private $config;

    /**
     * @param Client $client
     * @param Parser $parser
     * @param array $config
     */
    public function __construct(Client $client, Parser $parser, array $config)
    {
        $this->client = $client;

        $this->parser = $parser;

        $this->config = $config;
    }

    /**
     * @param \Exception $e
     */
    public function report(\Exception $e)
    {
        $apiKey = $this->getApiKey();
        $stage = $this->getStage();
        $endpoint = $this->getEndpoint();

        $notification = $this->parser->createNotification($e, $stage, $apiKey);

        $this->client->send($notification, $endpoint);
    }

    /**
     * @return mixed
     * @throws Exception
     */
    protected function getApiKey()
    {
        if ($this->config['apiKey']) {
            return $this->config['apiKey'];
        } else throw new Exception('No apiKey configured.');
    }

    /**
     * @return mixed
     * @throws Exception
     */
    protected function getStage()
    {
        if ($this->config['stage']) {
            return $this->config['stage'];
        } else throw new Exception('No stage configured.');
    }

    /**
     * @return mixed
     * @throws Exception
     */
    protected function getEndpoint()
    {
        if ($this->config['endpoint']) {
            return $this->config['endpoint'];
        } else throw new Exception('No endpoint configured.');
    }
}