<?php

namespace App\Events;

use App\Reviews;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SaveReview
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $review;

    public function __construct(Reviews $review)
    {
        $this->review = $review;
    }
}
