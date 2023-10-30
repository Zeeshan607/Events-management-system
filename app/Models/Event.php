<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        "title","image","description","city","country","organizer_type","address","datetime","event_organizer_id","is_approved"
    ];


    public function getOrganizer(){
        if($this->organizer_type=="admin"){
            return Admin::findOrFail($this->event_organizer_id);
        }
        if($this->organizer_type=="eo"){
            return EventOrganizer::findOrFail($this->event_organizer_id);
        }

    }

    public function getFormatedDateToEdit(){
        return Carbon::parse($this->datetime)->format('Y-m-d\TH:i');
    }

        public function Admin(){
                return $this->belongsTo(Admin::class,);
        }
    public function EventOrganizer(){
        return $this->belongsTo(EventOrganizer::class,);
    }

    public function InterestedUser(){
        return $this->belongsToMany(
            User::class,
            'users_interested_events',
            'events_id',
            'users_id',
        );
    }

    public function checkIfCurrentUserIsInterested($auth_user){

        foreach($this->InterestedUser as $user){
            if($user->id===$auth_user->id){
                return true;
            }
        }
        return false;
    }

}
