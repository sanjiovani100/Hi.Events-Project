<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class TwilioServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('twilio', function ($app) {
            $config = config('services.twilio');
            return new Client(
                $config['account_sid'],
                $config['auth_token']
            );
        });
    }

    public function boot()
    {
        //
    }
}
