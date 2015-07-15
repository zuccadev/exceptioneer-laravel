<?php namespace Spescina\Exceptioneer;

use Illuminate\Support\ServiceProvider;
use Noodlehaus\Config;

class ExceptioneerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Spescina\Exceptioneer\HttpClientInterface', GuzzleHttpClient::class);

        $this->app->singleton('exceptioneer', function ($app) {
            $httpClient = $this->app->make(HttpClientInterface::class);

            $client = new Client($httpClient);
            $configLoader = new Config(__DIR__ . '/config.php');

            return new Exceptioneer($client, new Parser(), $configLoader);
        });
    }

    public function boot()
    {
        $this->app->configure('exceptioneer');
    }
}
