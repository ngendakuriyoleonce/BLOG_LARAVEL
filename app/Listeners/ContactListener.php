<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use App\Mail\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(ContactEvent $event)
    {
         Mail::to("ngendakuriyoleonce75@gmail.com")->send(New ContactMail($event->details));
    }
}
