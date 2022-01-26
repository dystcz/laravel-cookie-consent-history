<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateCookieConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('cookie-consent-history.table_prefix').'cookie_consents', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('cookie_id')->nullable();
            $table->json('consent_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('cookie-consent-history.table_prefix').'cookie_consents');
    }
}
