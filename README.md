# Laravel-Mangopay Integration

This package makes it easier (hopefully!) to integrate the official
[Mangopay SDK](https://github.com/Mangopay/mangopay2-php-sdk) into your Laravel and Lumen applications.

[![Build Status](https://travis-ci.org/cviebrock/laravel-mangopay.svg?branch=master&format=flat)](https://travis-ci.org/cviebrock/laravel-mangopay)
[![Total Downloads](https://poser.pugx.org/cviebrock/laravel-mangopay/downloads?format=flat)](https://packagist.org/packages/cviebrock/laravel-mangopay)
[![Latest Stable Version](https://poser.pugx.org/cviebrock/laravel-mangopay/v/stable?format=flat)](https://packagist.org/packages/cviebrock/laravel-mangopay)
[![Latest Unstable Version](https://poser.pugx.org/cviebrock/laravel-mangopay/v/unstable?format=flat)](https://packagist.org/packages/cviebrock/laravel-mangopay)
[![License](https://poser.pugx.org/cviebrock/laravel-mangopay/license?format=flat)](https://packagist.org/packages/cviebrock/laravel-mangopay)

* [Installation](#installation)
  * [Laravel](#laravel)
  * [Lumen](#lumen)
* [Configuration](#configuration)
* [Usage](#usage)
* [Bugs, Suggestions and Contributions](#bugs-suggestions-and-contributions)
* [Copyright and License](#copyright-and-license)
  
---


## Installation

Depending on your version of Laravel, you should install a different 
version of the package. NOTE: As of version 6.0, the package's version 
should match the Laravel version.

| Laravel Version | Package Version |
|:---------------:|:---------------:|
|       7.0       |      ^7.0       |
|       6.0       |      ^6.0       |
|       5.*       |      ^0.9       |

### Laravel

1. Install the package via composer:

    ```sh
    composer require cviebrock/laravel-mangopay:^6.0
    ```

    After updating composer, the package will automatically register its 
    service provider.

2.  Publish the configuration file:

    ```sh
    php artisan vendor:publish --provider="Cviebrock\LaravelMangopay\ServiceProvider"
    ```

3.  Finally, generate the required temporary directories:

    ```sh
    php artisan mangopay:mkdir  
    ```


### Lumen

1. Install the package via composer:

    ```sh
    composer require cviebrock/laravel-mangopay:^6.0
    ```

2.  Copy the configuration file to your `config` folder and enable 
    everything in `bootstrap/app.php`:

    ```php
    $app->configure('mangopay');

    $app->register(Cviebrock\LaravelMangopay\ServiceProvider::class);
    ```

3.  Generate the required temporary directories:

    ```sh
    php artisan mangopay:mkdir  
    ```

## Configuration

This package supports authentication configuration through the services configuration file located
in `config/services.php`. Add the following block to that file, and set the appropriate
values in your `.env` file:

```php
'mangopay' => [
    'env'    => env('MANGOPAY_ENV', 'sandbox'),  // or "production"
    'key'    => env('MANGOPAY_KEY'),             // your Mangopay client ID
    'secret' => env('MANGOPAY_SECRET'),          // your Mangopay client password
],
```

The configuration file you can publish to `config/mangopay.php` provides additional
properties that can be passed to the MangopayAPI object when it is instantiated.  In
most cases, you won't need to change anything here, so you can choose to not publish this
configuration, or have it simply return an empty array.
  
If you do use this file, see the SDK documentation for the various properties that can be set
(basically any public property on the `MangoPay\Libraries\Configuration` class).



## Usage

All this package really does is make instantiating the `MangopayAPI` easy by 
putting the configuration into Laravel/Lumen's config system.

Using it is now as easy as injecting Mangopay into your controller, and then 
using it the same way you would use the `MangopayAPI` class:
  
```php
class MyController extends Illuminate\Routing\Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    private $mangopay;
    
    public function __construct(\MangoPay\MangoPayApi $mangopay) {
        $this->mangopay = $mangopay;
    }

    public function doStuff($someId)
    {
        // get some user by id
        $john = $this->mangopay->Users->Get($someId);

        // change and update some of his data
        $john->LastName .= " - CHANGED";
        $this->mangopay->Users->Update($john);

        // get his bank accounts
        $pagination = new MangoPay\Pagination(1, 10); // get 1st page, 10 items per page
        $accounts = $this->mangopay->Users->GetBankAccounts($john->Id, $pagination);

        // etc.
    }
}
```



## Bugs, Suggestions and Contributions

Thanks to [everyone](/cviebrock/laravel-mangopay/graphs/contributors) who has contributed 
to this project!   Special thanks to 
[JetBrains](https://www.jetbrains.com/?from=cviebrock/laravel-mangopay) for their 
Open Source License Program ... and the excellent PHPStorm IDE, of course!

[![JetBrains](./.github/jetbrains.svg)](https://www.jetbrains.com/?from=cviebrock/laravel-mangopay)

Please use [Github](https://github.com/cviebrock/laravel-mangopay) for reporting bugs, 
and making comments or suggestions.
 
See [CONTRIBUTING.md](CONTRIBUTING.md) for how to contribute changes.



## Copyright and License

laravel-mangopay was written by Colin Viebrock and released under the MIT License. 
See [LICENSE.md](LICENSE.md) file for details.

Copyright (c) 2016 Colin Viebrock
