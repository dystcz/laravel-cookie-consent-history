<?php

namespace Dystcz\CookieConsentHistory\Data;

class CookieConsentData
{
    /**
     * Data which will be stored as JSON.
     *
     * @param array $consent_data
     */
    public array $consent_data;

    public function __construct(array $consent_data)
    {
        $this->consent_data = $consent_data;
    }
}
