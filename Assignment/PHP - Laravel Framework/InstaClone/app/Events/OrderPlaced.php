<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $orderId;
    public $userEmail;

    /**
     * Create a new event instance.
     */
    public function __construct($orderId, $userEmail)
    {
        $this->orderId = $orderId;
        $this->userEmail = $userEmail;
    }
}