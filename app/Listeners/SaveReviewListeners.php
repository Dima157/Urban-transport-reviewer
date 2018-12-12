<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.12.2018
 * Time: 10:49
 */

namespace App\Listeners;

use App\Mail\SendReview;
use App\RabbitService\MailSender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SaveReview;
use Illuminate\Support\Facades\Mail;

class SaveReviewListeners
{

    public function handle(SaveReview $event)
    {
        $sender = new MailSender();
        $sender->execute($event->review);
    }

}