<?php

return [

    [
        'verb' => 'get',
        'uri' => '/api',
        'action' => function () {
            return ['message' => 'Exceptioneer API'];
        }
    ],

    [
        'verb' => 'post',
        'uri' => '/api/exceptions',
        'action' => 'App\Controllers\ExceptionsController::create'
    ]

];