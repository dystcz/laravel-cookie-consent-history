<?php

namespace Dystcz\CookieConsentHistory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCookieConsentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        //
    }

    public function rules()
    {
        return [
            // Whatever data you want to store in json
            // Preferrably info about consent categories
            // Example {"level":["necessary"],"revision":0,"data":{"id": "randomstringblabla"},"rfc_cookie":false}
            'consent_data' => [
                'required',
                'array',
            ],
        ];
    }

    public function messages()
    {
        return [
            'consent_data.required' => 'You need to provide consent data.',
            'consent_data.array' => 'Consent data has to be an array.',
        ];
    }
}
