<?php

namespace Spescina\Exceptioneer;


class Exceptioneer
{
    protected $client;

    protected $parser;

    public function __construct(Client $client, Parser $parser)
    {
        $this->client = $client;

        $this->parser = $parser;
    }

    public function report(\Exception $e)
    {
        $notification = $this->parser->createNotification($e);

        $this->client->send($notification);
    }
}