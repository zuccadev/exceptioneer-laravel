<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;

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

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    
    public static function createFromRequest(Request $request)
    {
        $object = new self();

        $event = $request->input('event');
        
        $object->code = $event['code'];
        $object->exception_class = $event['exceptionClass'];
        $object->message = $event['message'];
        $object->line = $event['line'];
        $object->file = $event['file'];
        $object->trace = serialize($event['trace']);
        $object->path = $event['path'];
        $object->uri = $event['uri'];
        $object->method = $event['method'];
        $object->client_ip = $event['clientIp'];
        $object->user_agent = $event['userAgent'];
        $object->time = $event['time'];

        return $object;
    }
}