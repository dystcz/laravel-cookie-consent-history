<?php

namespace Dystcz\CookieConsentHistory\Actions;

use Dystcz\CookieConsentHistory\Contracts\StoresCookieConsent;
use Illuminate\Support\Facades\Config;

class FindCookieConsentByCookieId
{
    public function handle(string $id): ?StoresCookieConsent
    {
        $consent = Config::get('cookie-consent-history.model')::query()
            ->byCookieId($id)
            ->first();

        return $consent;
    }
}

