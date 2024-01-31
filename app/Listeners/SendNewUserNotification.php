<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered; // Import the Registered event from Laravel's authentication system
use App\Mail\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewUserNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event) // Update the type-hint to expect the Registered event from Laravel's authentication system
    {
        $user = $event->user;

        // Sending the email notification
        Mail::to('modernize54@gmail.com')->send(new NewUserNotification($user));
    }
}


