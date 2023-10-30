<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterestedEvent extends Model
{
    use HasFactory,Uuids;

    protected  $fillable = ["users_id","events_id"];
    protected $table="users_interested_events";
}
