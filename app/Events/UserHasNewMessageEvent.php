<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserHasNewMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels ;

    public $u_id,$message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($u_id,Message $message)
    {
        //
        $this->message=$message;
        $this->u_id=$u_id;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        Log::info($this->u_id);
        Log::info($this->message);
        return new PrivateChannel("User-" . User::findOrFail($this->u_id)->id);
    }

    public function broadcastAs(){
        return "UserHasNewMessage";
    }

}
