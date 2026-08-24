<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendOrderNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        // Log basic order notification (from Task 2)
        Log::info('Order Notification: Order ID #' . $event->orderId . ' placed by ' . $event->userEmail);

        // Mock email content - logged instead of actually sent (simulating async email dispatch)
        Log::info('--- MOCK EMAIL SENT (via Queue) ---');
        Log::info('To: ' . $event->userEmail);
        Log::info('Subject: Your InstaClone Order Confirmation');
        Log::info('Body: Hi, your order #' . $event->orderId . ' has been placed successfully. Thank you for shopping with us!');
        Log::info('--- END MOCK EMAIL ---');
    }
}