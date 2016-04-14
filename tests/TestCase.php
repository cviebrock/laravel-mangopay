<?php namespace Cviebrock\LaravelMangopay\Test;

use Orchestra\Testbench\TestCase as Orchestra;


abstract class TestCase extends Orchestra
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    protected $mangopay;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->mangopay = $this->app[\MangoPay\MangoPayApi::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.mangopay', [
            'env' => env('MANGOPAY_ENV', 'sandbox'),
            'key' => env('MANGOPAY_KEY'),
            'secret' => env('MANGOPAY_SECRET'),
        ]);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Cviebrock\LaravelMangopay\ServiceProvider::class
        ];
    }
}
