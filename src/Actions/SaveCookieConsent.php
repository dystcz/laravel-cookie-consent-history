<?php

namespace Dystcz\CookieConsentHistory\Actions;

use Dystcz\CookieConsentHistory\Contracts\StoresCookieConsent;
use Dystcz\CookieConsentHistory\Data\CookieConsentData;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class SaveCookieConsent
{
    public function handle(CookieConsentData $data): StoresCookieConsent
    {
        $consent = Config::get('cookie-consent-history.model')::create([
            'uuid' => Str::uuid(),
            'cookie_id' => $data->cookie_id,
            'consent_data' => $data->consent_data,
        ]);

        return $consent;
    }
}
