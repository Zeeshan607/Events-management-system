<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('User-{id}', function ($user, $id) {

    return (int) $user->id === (int) $id;

},['guard'=>["web"]]);

Broadcast::channel('EventOrganizer-{id}', function ($eo, $id) {

    return (int) $eo->id === (int) $id;
},["guard" => ["event_organizer"]]);

//channel.bind('pusher:subscription_succeeded', function(members) {
//    alert('successfully subscribed!');
//});
