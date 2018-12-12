<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.11.2018
 * Time: 18:30
 */

namespace App\Facebook;


use League\OAuth2\Client\Provider\Facebook;

class FacebookClient
{

    CONST APP_ID = '2223172801342066';
    CONST SECRET_AAP = 'bae8e74c340d3e22852d9ac9b6beb4ae';
    CONST BASE_URL = 'https://www.facebook.com/dialog';
    private $provider;

    public function __construct()
    {
        $this->provider = new Facebook([
            'clientId'          => FacebookClient::APP_ID,
            'clientSecret'      => FacebookClient::SECRET_AAP,
            'redirectUri'       => 'https://1f7a2c56.ngrok.io/register-token',
            'graphApiVersion'   => 'v2.10',
        ]);
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function Url()
    {
        return new AuthUrlResource($this);
    }

}