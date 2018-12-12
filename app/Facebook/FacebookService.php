<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.11.2018
 * Time: 18:51
 */

namespace App\Facebook;


class FacebookService
{
    public static $client;

    public static function getClient()
    {
        if(isset(static::$client)) {
            return static::$client;
        }
        return static::$client = new FacebookClient();
    }
}