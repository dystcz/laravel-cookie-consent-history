<?php

namespace Dystcz\CookieConsentHistory;

use Dystcz\CookieConsentHistory\Actions\FindCookieConsentByCookieId;
use Dystcz\CookieConsentHistory\Actions\SaveCookieConsent;
use Dystcz\CookieConsentHistory\Data\CookieConsentData;
use Dystcz\CookieConsentHistory\Models\CookieConsent;

class CookieConsentHistory
{
    /**
     * Save cookie consent.
     *
     * @param CookieConsentData $data
     * @param SaveCookieConsent $action
     */
    public function save(CookieConsentData $data, SaveCookieConsent $action): ?CookieConsent
    {
        return $action->handle($data);
    }

    /**
     * Find cookie consent based on cookie id.
     *
     * @param string $cookieId
     * @param FindCookieConsentByCookieId $action
     */
    public function findByCookieId(string $cookieId, FindCookieConsentByCookieId $action): ?CookieConsent
    {
        return $action->handle($cookieId);
    }
}
