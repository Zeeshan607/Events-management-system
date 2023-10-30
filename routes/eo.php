<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventOrganizer;



Route::get("dashboard", [EventOrganizer\DashboardController::class,"index"])->name("dashboard");
Route::post("logout",[EventOrganizer\Auth\EventOrganizerLoginController::class,"eventOrganizerLogout"])->name("logout");

Route::get("events/pending_for_approval",[EventOrganizer\EventsController::class,"showNonApprovedEvents"])->name("events.unapproved");
Route::resource("events",EventOrganizer\EventsController::class)->except("showNonApprovedEvents");


Route::resource("profile",EventOrganizer\ProfileController::class);


//laravel echo multi auth broadcast authentication url
Route::any('/broadcasting/auth', '\Illuminate\Broadcasting\BroadcastController@authenticate');


//VUE aXios request routes
Route::group(['prefix'=>"inbox","as"=>"inbox."],function(){
    Route::resource('/',EventOrganizer\InboxController::class)->except(["loadConversations","handleSendMsg","mark_as_read"]);
    Route::get('/loadConversations/{eo_id?}',[EventOrganizer\InboxController::class,"loadConversations"])->name("conversations.load");
    Route::post('/send_msg',[EventOrganizer\InboxController::class,"handleSendMsg"])->name("msg.send");
    Route::post("/mark_as_read",[EventOrganizer\InboxController::class,"mark_as_read"])->name('mark_as_read');
    Route::post("/delete_conversation",[EventOrganizer\InboxController::class,"delete_conversation"])->name("conversation.delete");
    Route::get("/get_all_msg_of_new_conv",[EventOrganizer\InboxController::class,"FetchAllMsgsOfConversation"])->name("new_conversation_msg.get");
});

