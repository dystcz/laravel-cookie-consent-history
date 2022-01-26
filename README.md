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

## Configuration

```php
<?php

return [
    /**
     * The prefix for the table names.
     * You can use your own prefix here, eg. company_ if it were to conflict with existing table names.
     * We leave it empty, so the table name is cookie_consents by default.
     */
    'table_prefix' => '',

    /**
     * Model class definition.
     * You can extend the base model to your needs.
     */
    'model' => Dystcz\CookieConsentHistory\Models\CookieConsent::class,
];
```

## Usage

### Storing consents

```php
// Example of storing a cookie consent in your controller

use Dystcz\CookieConsentHistory;
use Dystcz\CookieConsentHistory\Data\CookieConsentData;

public function store(Request $request)
{
    // Or use dedicated FormRequest
    $request->validate([
        // Cookie id which comes from your frontend
        // Can be any unique hash which serves for indentification
        'cookie_id' => [
            'required',
            'string',
        ],
        // Whatever data you want to store in json
        // Preferrably info about consent categories
        // Example {"level":["necessary"],"revision":0,"data":null,"rfc_cookie":false}
        'consent_data' => [
            'required',
            'array',
        ],
    ])

    // Create DTO out of validated request
    $data = new CookieConsentData(...$request->validated());

    // Or create it manually
    $data = new CookieConsentData(
        $request->input('cookie_id'),
        $request->input('consent_data')
    );

    // PHP 8 style
    $data = new CookieConsentData(
        cookie_id: $request->input('cookie_id'),
        consent_data: $request->input('consent_data')
    );

    $consent = CookieConsentHistory::save();

    return $consent;
}

```

### Getting consents

```php
// Example of getting a cookie consent in your controller

use Dystcz\CookieConsentHistory;

public function show(Request $request)
{
    // Or use dedicated FormRequest
    $request->validate([
        // Cookie id which comes from your frontend
        'cookie_id' => [
            'required',
            'string',
        ],
    ])

    $consent = CookieConsentHistory::find($request->input('cookie_id'));

    // Returns CookieConsent or null
    return $consent;
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
