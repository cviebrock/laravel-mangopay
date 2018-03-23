<?php namespace Cviebrock\LaravelMangopay\Test;

use Cviebrock\LaravelMangopay\ServiceProvider;
use MangoPay\MangoPayApi;


class ServiceProviderTest extends TestCase
{

    /**
     * @test
     */
    public function testServiceProviderInstantiatesApi()
    {
        $this->assertEquals(MangoPayApi::class, get_class($this->mangopay));
    }

    /**
     * @test
     */
    public function testConfigurationValuesAreSet()
    {
        $this->assertEquals(getenv('MANGOPAY_KEY'), $this->mangopay->Config->ClientId);
        $this->assertEquals(getenv('MANGOPAY_SECRET'), $this->mangopay->Config->ClientPassword);

        $environment = getenv('MANGOPAY_ENV');
        $url = constant(ServiceProvider::class . '::BASE_URL_' . strtoupper($environment));

        $this->assertEquals($url, $this->mangopay->Config->BaseUrl);
    }
}
