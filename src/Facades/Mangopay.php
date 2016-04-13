<?php namespace Cviebrock\LaravelMangopay\Facades;

use Illuminate\Support\Facades\Facade;


class Mangopay extends Facade
{

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return MangoPayApi::class;
    }
}
