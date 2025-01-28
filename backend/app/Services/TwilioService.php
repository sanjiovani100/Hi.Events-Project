<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $fromNumber;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->fromNumber = config('services.twilio.whatsapp_from');
    }

    public function sendWhatsAppMessage($to, $message)
    {
        return $this->client->messages->create(
            "whatsapp:$to",
            [
                'from' => "whatsapp:{$this->fromNumber}",
                'body' => $message
            ]
        );
    }

    public function sendSMS($to, $message)
    {
        return $this->client->messages->create(
            $to,
            [
                'from' => $this->fromNumber,
                'body' => $message
            ]
        );
    }
}
