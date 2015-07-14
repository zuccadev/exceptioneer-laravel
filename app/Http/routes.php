<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    throw new \Symfony\Component\HttpKernel\Exception\HttpException(202, 'This is an Exception');
});

$app->post('/notifications', ['uses' => 'NotificationsController@create']);
