<?php

namespace App\Listeners;

use App\Events\NewEventCreated;
use App\Mail\NewEventCreatedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNewEventCreatedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewEventCreated  $event
     * @return void
     */
    public function handle(NewEventCreated $event)
    {
        //
        $users=User::where("city",$event->event->city)->get();
        foreach($users as $user){
           Mail::to($user->email)->send(new NewEventCreatedMail($event->event,$user));

        }
        Log::info("mail send");
    }
}
