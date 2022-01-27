<?php

return [
    /**
     * The prefix for the table names.
     * You can use your own prefix here, eg. company_ if it were to conflict with existing table names.
     * We leave it empty, so the table name is cookie_consents by default.
     */
    'table_prefix' => '',

    /**
     * The prefix for routes.
     * There are only 2 routes, one for storing the consent data and one for retrieving.
     *
     * POST /cookie-consents (or your prefix) saves the consent
     * GET /cookie-consents/{id} gets the consent if exists
     */
    'route_prefix' => 'cookie-consents',

    /**
     * Model definition.
     * You can extend the base model to your needs.
     */
    'model' => Dystcz\CookieConsentHistory\Models\CookieConsent::class,
];
