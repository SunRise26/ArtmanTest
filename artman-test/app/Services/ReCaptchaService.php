<?php

namespace App\Services;

use GuzzleHttp\Client;

class ReCaptchaService
{
    protected static string $verify_uri = 'https://www.google.com/recaptcha/api/siteverify';

    public static function validateV2($clientResponse, $requestIp = null)
    {
        $client = new Client();
        $response = $client->post(self::$verify_uri, [
            'form_params' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response' => $clientResponse,
                'remoteip' => $requestIp
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody(), true);
            return $body['success'];
        }
        return false;
    }
}
