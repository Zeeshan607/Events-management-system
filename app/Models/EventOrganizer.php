<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\EventOrganizerResetPasswordNotification;
use App\Traits\Uuids;

class EventOrganizer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'country',
        'city',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EventOrganizerResetPasswordNotification($token));
    }

    public function Events(){
        return $this->hasMany(Event::class,"event_organizer_id");
    }

    public function Conversations(){
        return $this->hasMany(Conversation::class);
    }
}
