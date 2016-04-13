<?php namespace Cviebrock\LaravelMangopay;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use MangoPay\MangoPayApi;


class LumenServiceProvider extends IlluminateServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MangoPayApi::class, function ($app) {

            $config = $app['config']['laravel-mangopay'];
            $api = new MangoPayApi();

            // use the Laravel logger (can be overridden in the config file)
            $api->setLogger($app['log']);

            foreach ($config as $property => $value) {
                $api->Config->{$property} = $value;
            }

            return $api;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [MangoPayApi::class];
    }
}
