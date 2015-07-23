# exceptioneer-laravel
Exceptioneer client for Laravel 5 and Lumen

## install on lumen

Bind the exceptioneer handler to the ExceptionHandler contract updating the singleton with `Zuccadev\ExceptioneerLaravel\Lumen\Handler::class`

Register the service provider in `bootstrap/app.php` adding `$app->register(Zuccadev\ExceptioneerLaravel\Lumen\ExceptioneerServiceProvider::class);` in the relative section

Create the `config/exceptioneer.php` file using this as a template
```
<?php

return [

    'apiKey' => 'yourApiKey!!!',

    'stage' => 'production',

    'endpoint' => 'http://<your.exceptioneer.server.domain>/api/v1/notifications',

    'logInApp' => false

];
```
