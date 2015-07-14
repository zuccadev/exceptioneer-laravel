<?php

namespace Spescina\Exceptioneer;

class Notification
{
    public $code;
    public $exceptionClass;
    public $message;
    public $line;
    public $file;
    public $trace;
    public $path;
    public $uri;
    public $method;
    public $clientIp;
    public $userAgent;
    public $time;

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}