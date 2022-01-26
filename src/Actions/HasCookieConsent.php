<?php

namespace Dystcz\CookieConsentHistory\Actions;

class HasCookieConsent
{
    public function handle(string $id, FindCookieConsentByCookieId $findConsent): bool
    {
        return $findConsent->handle($id) ? true: false;
    }
}

