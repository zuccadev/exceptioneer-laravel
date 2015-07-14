<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Notification extends Eloquent
{
    protected $fillable = [
        'code',
        'exception_class',
        'message',
        'line',
        'file',
        'trace',
        'path',
        'uri',
        'method',
        'client_ip',
        'user_agent',
        'time'
    ];
}