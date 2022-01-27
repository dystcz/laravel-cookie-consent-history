<?php

namespace Dystcz\CookieConsentHistory\Http\Controllers;

use Dystcz\CookieConsentHistory\CookieConsentHistoryFacade as CookieConsentHistory;
use Dystcz\CookieConsentHistory\Data\CookieConsentData;
use Dystcz\CookieConsentHistory\Http\Requests\StoreCookieConsentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class CookieConsentsController extends Controller
{
    /**
     * Store cookie consent data.
     *
     * @param StoreCookieConsentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCookieConsentRequest $request)
    {
        // Create DTO out of validated request
        $data = new CookieConsentData(...$request->validated());

        $consent = CookieConsentHistory::save($data);

        return new JsonResponse([
            'data' => $consent,
        ]);
    }
}
