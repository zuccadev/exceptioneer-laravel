<?php namespace Zuccadev\ExceptioneerLaravel\Lumen;

use Illuminate\Support\ServiceProvider;
use Zuccadev\ExceptioneerLaravel\Client;
use Zuccadev\ExceptioneerLaravel\Exceptioneer;
use Zuccadev\ExceptioneerLaravel\GuzzleHttpClient;
use Zuccadev\ExceptioneerLaravel\HttpClientInterface;
use Zuccadev\ExceptioneerLaravel\Parser;

class ExceptioneerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->configure('exceptioneer');

        $this->app->bind(HttpClientInterface::class, GuzzleHttpClient::class);

        $this->app->bind('exceptioneer', function ($app) {
            $httpClient = $this->app->make(HttpClientInterface::class);

            $client = new Client($httpClient);

            $config = $this->loadConfig();

            return new Exceptioneer($client, new Parser(), $config);
        });
    }

    public function boot() {}

    protected function loadConfig()
    {
        $apiKey = config('exceptioneer.apiKey');
        $stage = config('exceptioneer.stage');
        $endpoint = config('exceptioneer.endpoint');
        $logInApp = config('exceptioneer.logInApp');

        return compact('apiKey', 'stage', 'endpoint', 'logInApp');
    }
}
