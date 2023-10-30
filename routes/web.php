<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/events', [\App\Http\Controllers\EventsController::class,"index"] )->name("events");
Route::get('/events/{id}', [\App\Http\Controllers\EventsController::class,"show"] )->name("events.show");
Route::post('/events/search', [\App\Http\Controllers\EventsController::class,"getSearchRequest"] )->name("events.search");
Route::get('/chat/{eo_name}',[\App\Http\Controllers\ChatController::class,"index"])->name('chat.index');
Route::get('/about', function () {
    return view('front.about');
});
Auth::routes();
Route::any('/broadcasting/auth', '\Illuminate\Broadcasting\BroadcastController@authenticate');









//client side chat system Axios Requests URLS
Route::post('/send_sms',[App\Http\Controllers\ChatController::class,"handleSendMsg"])->name("sms.send");
Route::get('/get_chat/{user?}/{eo?}',[App\Http\Controllers\ChatController::class,"getChat"])->name("fetch");
Route::get("/getEoProfile/{id?}", [App\Http\Controllers\EventOrganizer\ProfileController::class,"getProfile"])->name("eo.profile");
Route::get("/getUserProfile/{id?}",function(Request $request){
 if($request->ajax()){
     return response()->json(['user'=>\App\Models\User::findOrFail($request->id)]);
 }
    abort(404);
})->name("user.profile");
Route::post('/mark_as_read',[App\Http\Controllers\ChatController::class,"mark_as_read"])->name("mark_as_read");


//open web ajax request
Route::post("/user_has_interested_event", [App\Http\Controllers\EventsController::class,"handleUserEventInterest"])->name("user.events.interest");








//Event Organizer side Guest routes
Route::group(["prefix"=>"eo","as"=>"eo."],function(){
    Route::get("/login" ,[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerLoginController::class,"showLoginForm"])->name("login");
    Route::post("/login" ,[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerLoginController::class,"eventOrganizerLogin"])->name("login");
    Route::get("/register" ,[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerRegisterController::class,"showRegistrationForm"])->name("register");
    Route::post("/register" ,[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerRegisterController::class,"register"])->name("register");
    Route::get("/password/reset",[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerResetPasswordController::class,"showResetForm"])->name("password.reset");
    Route::post("/password/update",[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerResetPasswordController::class,"reset"])->name("password.update");
    Route::get("/password/request",[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerForgotPasswordController::class,"showLinkRequestForm"])->name("password.request");
    Route::post("/password/email",[\App\Http\Controllers\EventOrganizer\Auth\EventOrganizerForgotPasswordController::class,"sendResetLinkEmail"])->name("password.email");

});
//admin side Guest routs
Route::group(["prefix"=>"admin","as"=>"admin."],function(){
    Route::get("login",[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,"showLoginForm"])->name("login");
    Route::post("login",[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,"adminLogin"])->name("login");

});


