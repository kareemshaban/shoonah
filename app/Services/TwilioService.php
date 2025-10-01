<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_WHATSAPP_NUMBER'); // Your Twilio WhatsApp number

        // Create Twilio client, passing in an array with 'verify' set to false.
        $this->twilio = new Client($sid, $token, [
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification
            ],
        ]);
    }

    public function sendWhatsAppMessageToMultiple($toList, $message)
    {
        $from = env('TWILIO_WHATSAPP_NUMBER'); // From your Twilio WhatsApp number

        // Loop through all phone numbers and send the message
        $responses = [];
        foreach ($toList as $to) {
            $response = $this->twilio->messages->create(
                'whatsapp:' . $to, // To WhatsApp number
                [
                    'from' => $from, // From Twilio WhatsApp number
                    'body' => $message // The message content
                ]
            );
            $responses[] = $response; // Collect the responses
        }

        return $responses;
    }
}
