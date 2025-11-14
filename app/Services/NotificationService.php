<?php

namespace App\Services;

class NotificationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function send($message, $recipient)
    {
        return "Notification is send to {$recipient} with message: {$message}";
    }
}
