<?php

return [
    /**
     * The prefix for the table names.
     * You can use your own prefix here, eg. company_ if it were to conflict with existing table names.
     * We leave it empty, so the table name is cookie_consents by default.
     */
    'table_prefix' => '',

    /** 
     * Model definition.
     * You can extend the base model to your needs.
     */
    'model' => Dystcz\CookieConsentHistory\Models\CookieConsent::class,
];
