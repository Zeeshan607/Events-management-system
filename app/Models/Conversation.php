<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;


class Conversation extends Model
{
    use HasFactory, Uuids;

    protected $fillable=['sender','receiver','sender_type',"eo_last_seen_at","user_last_seen_at"];



    public function Messages(){
        return $this->hasMany(Message::class,"conversation_id");
        }

    public function sender(){
        if($s=User::findOrFail($this->sender)){
            return $s;
        }
        if($s=EventOrganizer::findOrFail($this->sender)){
            return $s;
        }
    }
    public function receiver(){
        if($r=User::findOrFail($this->receiver)){
            return $r;
        }
        if($r=EventOrganizer::findOrFail($this->receiver)){
            return $r;
        }
    }

//        public function getSender(){
//            return User::find($this->sender);
//        }

//        public function sender(){
//        return $this->hasOne()
//        }
}
