<?php

namespace Spescina\Exceptioneer;


class Exceptioneer
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function report(\Exception $e)
    {
        $this->client->send($e);
    }
}