<?php

namespace Dystcz\CookieConsentHistory\Data;

class CookieConsentData
{
    /**
     * Data which will be stored as JSON.
     *
     * @param array $data
     */
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
