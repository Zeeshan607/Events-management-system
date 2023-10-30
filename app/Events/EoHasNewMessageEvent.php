<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\EventOrganizer;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EoHasNewMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $eo_id;
    public $conversation, $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($eo_id, Conversation $con,Message $msg)
    {
        //

        $this->eo_id=$eo_id;
        $this->conversation=$con;
        $this->message=$msg;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        Log::info($this->conversation);
        return new PrivateChannel('EventOrganizer-'. EventOrganizer::findOrFail($this->eo_id)->id);
    }
    public function broadcastAs(){
        return "EoHasNewMessage";
    }
    public function broadcastWith(){
        $conv=$this->conversation;
//        $conv["messages"]=$this->conversation->messages;
        $conv["sender_profile"]=$this->conversation->sender();
        return [
            "eo_id"=>$this->eo_id,
            "conversation"=>$conv,
            "message"=>$this->message,
        ];
        }
}
