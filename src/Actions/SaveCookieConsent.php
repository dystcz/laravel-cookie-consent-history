<?php

namespace Dystcz\CookieConsentHistory\Actions;

use Dystcz\CookieConsentHistory\Contracts\StoresCookieConsent;
use Dystcz\CookieConsentHistory\Data\CookieConsentData;
use Illuminate\Support\Facades\Config;

class SaveCookieConsent
{
    public function handle(CookieConsentData $data): StoresCookieConsent
    {
        $consent = Config::get('cookie-consent-history.model')::create([
            'consent_data' => $data->consent_data,
        ]);

        return $consent;
    }
}
