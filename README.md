# Laravel Easy Fixer.io API

Provides an easy to use Laravel package for fixer.io exchange rates and currency conversion JSON API.

## Installation
Run the following from the root of your Laravel app.

``composer require elouafi/laravel-easyfixerapi``

## Usage

```php
use ElouafiDev\EasyFixerApi\FixerApi;

$fixerio = new FixerApi(" KEY Fixer API ");

$fixerio->apiget(); // Get currency values from API

$fixerio->CurrencyExchange(1,"USD","MAD")
/*If the result is -1, you have an error*/

```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/license/MIT).
