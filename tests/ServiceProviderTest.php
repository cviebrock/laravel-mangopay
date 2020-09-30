<?php namespace Cviebrock\LaravelMangopay\Test;

use Cviebrock\LaravelMangopay\ServiceProvider;
use MangoPay\MangoPayApi;


class ServiceProviderTest extends TestCase
{

    public function testServiceProviderInstantiatesApi(): void
    {
        $this->assertEquals(MangoPayApi::class, get_class($this->mangopay));
    }

    /**
     * @test
     */
    public function testConfigurationValuesAreSet()
    {
        $this->assertEquals(env('MANGOPAY_KEY'), $this->mangopay->Config->ClientId);
        $this->assertEquals(env('MANGOPAY_SECRET'), $this->mangopay->Config->ClientPassword);

        $environment = env('MANGOPAY_ENV');
        $url = constant(ServiceProvider::class . '::BASE_URL_' . strtoupper($environment));

        $this->assertEquals($url, $this->mangopay->Config->BaseUrl);
    }
}
