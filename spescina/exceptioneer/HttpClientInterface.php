<?php

namespace Spescina\Exceptioneer;


interface HttpClientInterface
{
    public function send(Notification $notification);
}