<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationsController extends ApiController
{
    public function create(Request $request)
    {
        $data = [
            'code' => $request->input('code'),
            'exception_class' => $request->input('exceptionClass'),
            'message' => $request->input('message'),
            'line' => $request->input('line'),
            'file' => $request->input('file'),
            'trace' => serialize($request->input('trace')),
            'path' => $request->input('path'),
            'uri' => $request->input('uri'),
            'method' => $request->input('method'),
            'client_ip' => $request->input('clientIp'),
            'user_agent' => $request->input('userAgent'),
            'time' => $request->input('time'),
        ];

        Notification::create($data);

        return $this->respond(['msg' => 'created']);
    }
}