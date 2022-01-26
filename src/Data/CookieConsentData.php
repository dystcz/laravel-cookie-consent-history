<?php

namespace Dystcz\CookieConsentHistory\Data;

class CookieConsentData
{
    /**
     * Cookie id.
     *
     * @param string $cookie_id
     */
    public string $cookie_id;

    /**
     * Data which will be stored as JSON.
     *
     * @param array $consent_data
     */
    public array $consent_data;

    public function __construct(string $cookie_id, array $consent_data)
    {
        $this->cookie_id = $cookie_id;

        $this->consent_data = $consent_data;
    }
}
