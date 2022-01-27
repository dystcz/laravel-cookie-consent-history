# Laravel cookie consent history

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dystcz/laravel-cookie-consent-history.svg?style=flat-square)](https://packagist.org/packages/dystcz/laravel-cookie-consent-history)
[![Total Downloads](https://img.shields.io/packagist/dt/dystcz/laravel-cookie-consent-history.svg?style=flat-square)](https://packagist.org/packages/dystcz/laravel-cookie-consent-history)
<!-- ![GitHub Actions](https://github.com/dystcz/laravel-cookie-consent-history/actions/workflows/main.yml/badge.svg) -->

This packages aims to make it easy to store anonymous cookie consents in a database in order to comply with rather strict EU cookie policy laws.
Your application will get the power of keeping consent history, so you will have no problem with your burden of proof process when someone complains
about your cookie consents.

## Installation

You can install the package via composer:

```bash
composer require dystcz/laravel-cookie-consent-history
```

Publish config and migrations, run migrations

```bash
php artisan vendor:publish --provider="Dystcz\CookieConsentHistory\CookieConsentHistoryServiceProvider"
php artisan migrate
```

Register package routes in some of your route files, but if you want to use your own routes and controller, that is completely fine.

```php
// routes/api.php

use Dystcz\CookieConsentHistory\CookieConsentHistoryFacade;

CookieConsentHistoryFacade::routes();
```

## Configuration

```php
return [
    /**
     * The prefix for the table names.
     * You can use your own prefix here, eg. company_ if it were to conflict with existing table names.
     * We leave it empty, so the table name is cookie_consents by default.
     */
    'table_prefix' => '',

    /**
     * The prefix for routes.
     * There are only 2 routes, one for storing the consent data and one for retrieving.
     *
     * POST /cookie-consents (or your prefix) saves the consent
     * GET /cookie-consents/{id} gets the consent if exists
     */
    'route_prefix' => 'cookie-consents',

    /**
     * Model definition.
     * You can extend the base model to your needs.
     */
    'model' => Dystcz\CookieConsentHistory\Models\CookieConsent::class,
];
```

## Usage

### Storing consents

You can either register package routes, or you can introduce your own with your controller.

Below is an example store method which comes from `Dystcz\CookieConsentHistory\Http\Controllers\CookieConsentsController`.

```php
/**
* Store cookie consent data.
*
* @param StoreCookieConsentRequest $request
*
* @return \Illuminate\Http\JsonResponse
*/
public function store(StoreCookieConsentRequest $request)
{
    // Create DTO out of validated request
    $data = new CookieConsentData(...$request->validated());

    $consent = CookieConsentHistory::save($data);

    return new JsonResponse([
        'data' => $consent,
    ]);
}
```

### Testing

Tests coming soon!

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jakub@dy.st instead of using the issue tracker.

## Credits

-   [Jakub Theimer](https://github.com/dystcz)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
