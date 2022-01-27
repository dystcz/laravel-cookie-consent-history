<?php

namespace Dystcz\CookieConsentHistory;

use Dystcz\CookieConsentHistory\Actions\SaveCookieConsent;
use Dystcz\CookieConsentHistory\Data\CookieConsentData;
use Dystcz\CookieConsentHistory\Http\Controllers\CookieConsentsController;
use Dystcz\CookieConsentHistory\Models\CookieConsent;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

class CookieConsentHistory
{
    /**
     * Save cookie consent.
     *
     * @param CookieConsentData $data
     *
     * @return CookieConsent
     */
    public function save(CookieConsentData $data): CookieConsent
    {
        return (new SaveCookieConsent)->handle($data);
    }

    /**
     * Register routes.
     *
     * @return void
     */
    public function routes(): void
    {
        Route::group(['prefix' => Config::get('cookie-consent-history.route_prefix')], function () {
            Route::post('/', [CookieConsentsController::class, 'store']);
            Route::get('/{cookieId}', [CookieConsentsController::class, 'show']);
        });
    }
}
