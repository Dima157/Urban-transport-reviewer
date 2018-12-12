<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.12.2018
 * Time: 12:22
 */

namespace App\RabbitService;


use App\Mail\SendReview;
use Illuminate\Support\Facades\Mail;

class MailReceiver extends RabbitBase
{

    public function listen()
    {
        $channel = $this->rabbit->channel();
        $this->queueDeclare($channel);

        $channel->basic_consume(
            'sendMail',
            '',
            false,
            true,
            false,
            false,
            array($this, 'processOrder')
        );

        while(count($channel->callbacks)) {
            $channel->wait();
        }

        $channel->close();
        $this->rabbit->close();
    }

    /**
     * @param $msg
     */
    public function sendEmail($msg)
    {
        Mail::to('')->send(new SendReview($msg));
    }

}