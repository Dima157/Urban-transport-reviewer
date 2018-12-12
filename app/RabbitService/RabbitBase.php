<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.12.2018
 * Time: 12:19
 */

namespace App\RabbitService;


class RabbitBase
{

    protected $rabbit;

    public function __construct()
    {
        $this->rabbit = new \AMQPConnection(
            'localhost',
            '5672',
            'dima_s',
            '123'
        );
    }

    protected function queueDeclare($channel)
    {
        $channel->queue_declare(
            'sendMail',
            false,
            false,
            false,
            false
        );
    }

}