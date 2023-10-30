<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=['from','body',"conversation_id","read_at"];

    public function Conversation(){
        return $this->belongsTo(Conversation::class,'conversation_id',"id");
    }
}
