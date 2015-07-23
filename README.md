# exceptioneer-laravel
Exceptioneer client for Laravel 5 and Lumen

## install on lumen

Bind the exceptioneer handler to the ExceptionHandler contract updating the singleton with `Zuccadev\ExceptioneerLaravel\Lumen\Handler::class`

Register the service provider in `bootstrap/app.php` adding `$app->register(Zuccadev\ExceptioneerLaravel\Lumen\ExceptioneerServiceProvider::class);` in the relative section

Add and edit these values to your `.env` file
```
EXCEPTIONEER_KEY=yourApiKey!!!
EXCEPTIONEER_STAGE=production
EXCEPTIONEER_SERVER=http://<yourExceptioneerServerDomain>/api/v1/notifications
EXCEPTIONEER_LOGAPP=false
```
