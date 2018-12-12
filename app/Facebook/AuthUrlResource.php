<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.11.2018
 * Time: 18:38
 */

namespace App\Facebook;


use League\OAuth2\Client\Provider\Facebook;

class AuthUrlResource
{
    private $client;

    public function __construct(FacebookClient $client)
    {
        $this->client = $client;
    }

    public function getAuthUrl()
    {
        return $this->client->getProvider()->getAuthorizationUrl([
            'scope' => ['email'],
        ]);
    }
}