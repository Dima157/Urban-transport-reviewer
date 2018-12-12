<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.12.2018
 * Time: 12:08
 */

namespace App\RabbitService;


use App\Reviews;
use PhpAmqpLib\Message\AMQPMessage;

class MailSender extends RabbitBase
{

    public function execute(Reviews $review)
    {
        $channel = $this->rabbit->channel();
        $this->queueDeclare($channel);
        $msg = new AMQPMessage($review);
        $channel->basic_publish(
            $msg,
            '',
            'sendMail'
        );
        while(count($channel->callbacks)) {
            $channel->wait();
        }
        $channel->close();
        $this->rabbit->close();
    }
}