<?php namespace Spescina\Exceptioneer;

use Illuminate\Support\ServiceProvider;

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

            return new Exceptioneer($client);
        });
    }

    public function boot()
    {
        $this->app->configure('exceptioneer');
    }
}
