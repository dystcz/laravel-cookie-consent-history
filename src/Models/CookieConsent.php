<?php

namespace Dystcz\CookieConsentHistory\Models;

use Dystcz\CookieConsentHistory\Contracts\StoresCookieConsent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CookieConsent extends Model implements StoresCookieConsent
{
    /**
     * Create a new instance of the Model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(Config::get('cookie-consent-history.table_prefix').$this->getTable());
    }

    /**
     * Casts the attributes to the correct type.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'json',
    ];

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        //
    ];

    /**
     * Scope CookieConsents by cookie id.
     *
     * @param mixed $query
     * @param string $ip
     *
     * return Builder
     */
    public function scopeByCookieId($query, string $id): Builder
    {
        return $query->where('cookie_id', $id);
    }
}
