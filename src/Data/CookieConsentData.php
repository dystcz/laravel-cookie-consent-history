<?php

namespace Dystcz\CookieConsentHistory\Data;

class CookieConsentData
{
    /**
     * Cookie id.
     *
     * @param string $cookieId
     */
    public string $cookieId;

    /**
     * Data which will be stored as JSON.
     *
     * @param data $data
     */
    public array $data;

    public function __construct(string $cookieId, array $data)
    {
        $this->cookieId = $cookieId;

        $this->data = $data;
    }
}
