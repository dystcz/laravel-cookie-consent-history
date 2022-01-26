<?php

namespace Dystcz\CookieConsentHistory;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dystcz\CookieConsentHistory\Skeleton\SkeletonClass
 */
class CookieConsentHistoryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-cookie-consent-history';
    }
}
